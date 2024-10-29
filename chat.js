const userOneId = 1;  // Replace with the logged-in user ID
const userTwoId = 2;  // Replace with the other user ID

function sendMessage() {
   const message = document.getElementById('messageInput').value;
   if (!message.trim()) return;  // Prevent empty messages

   fetch('sendMessage.php', {
       method: 'POST',
       headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
       body: `user_one_id=${userOneId}&user_two_id=${userTwoId}&message=${encodeURIComponent(message)}&sent_by=${userOneId}`
   }).then(response => response.text()).then(data => {
       console.log(data);
       document.getElementById('messageInput').value = '';
       loadMessages();
   });
}

function loadMessages() {
   fetch(`getMessages.php?user_one_id=${userOneId}&user_two_id=${userTwoId}`)
       .then(response => response.json())
       .then(messages => {
           const chatBox = document.getElementById('chatBox');
           chatBox.innerHTML = messages.map(message =>
               `<div class="message ${message.sent_by == userOneId ? 'sent' : 'received'}">
                   <p class="text">${message.message}</p>
                   <span class="timestamp">${message.timestamp}</span>
               </div>`
           ).join('');
           chatBox.scrollTop = chatBox.scrollHeight;  // Auto-scroll to the bottom
       });
}

// Load messages every 5 seconds to update chat
setInterval(loadMessages, 5000);
