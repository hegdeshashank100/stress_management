import mysql.connector
import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
import time
import os

# Database connection details
db_host = 'localhost'
db_user = 'root'
db_password = ''  # Your database password
db_name = 'stress_management'

# Email configuration
smtp_server = 'smtp.gmail.com'
smtp_port = 587
smtp_username = ''  # Replace with your email
smtp_password = ''  # Replace with your email password

# File to store the last processed ID
last_processed_id_file = 'last_processed_id.txt'

def send_confirmation_email(name, email):
    msg = MIMEMultipart()
    msg['From'] = smtp_username
    msg['To'] = email
    msg['Subject'] = 'Thank You for Your Support'
    
    body = f"Dear {name},\nThank you so much for getting in touch with us! Your thoughts and needs are very important to us, and we’re here to help in any way we can. Our team is already on it, and we’ll reach out to you shortly with the information or support you need.\nIn the meantime, feel free to explore our resources or reach out if there's anything else on your mind. We're always here for you!\n\nWarm regards,\nThe Feel Free Team"
    msg.attach(MIMEText(body, 'plain'))

    try:
        with smtplib.SMTP(smtp_server, smtp_port) as server:
            server.starttls()
            server.login(smtp_username, smtp_password)
            server.send_message(msg)
            print(f'Confirmation email sent to {email}')
    except Exception as e:
        print(f'Failed to send email to {email}. Error: {e}')

def get_last_processed_id():
    if os.path.exists(last_processed_id_file):
        with open(last_processed_id_file, 'r') as f:
            return int(f.read().strip())
    return 0

def update_last_processed_id(last_id):
    with open(last_processed_id_file, 'w') as f:
        f.write(str(last_id))

def main():
    # Get the last processed ID
    last_processed_id = get_last_processed_id()

    while True:
        try:
            conn = mysql.connector.connect(
                host=db_host,
                user=db_user,
                password=db_password,
                database=db_name
            )
            cursor = conn.cursor()

            # Fetch new messages added after the last processed ID
            cursor.execute("SELECT name, email, id FROM contact_messages WHERE id > %s ORDER BY id", (last_processed_id,))
            records = cursor.fetchall()

            if records:
                for name, email, message_id in records:
                    send_confirmation_email(name, email)
                    last_processed_id = message_id  # Update to the latest processed ID

                # Update the last processed ID after sending emails
                update_last_processed_id(last_processed_id)

        except mysql.connector.Error as err:
            print(f"Database error: {err}")
        except Exception as e:
            print(f"Error: {e}")
        finally:
            if conn.is_connected():
                cursor.close()
                conn.close()

        # Sleep for a specified interval before checking again (e.g., 10 seconds)
        time.sleep(5)

if __name__ == "__main__":
    main()
