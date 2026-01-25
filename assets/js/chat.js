const chatButton = document.querySelector('.chat-button');
const chatPanel = document.querySelector('.chat-panel');
const chatForm = document.querySelector('.chat-form');
const chatMessages = document.querySelector('.chat-messages');

const chatHistoryKey = 'kindlytech_chat_history';

const renderHistory = () => {
  if (!chatMessages) return;
  const history = JSON.parse(localStorage.getItem(chatHistoryKey) || '[]');
  chatMessages.innerHTML = '';
  history.forEach((entry) => {
    const div = document.createElement('div');
    div.className = 'chat-message';
    div.textContent = `${entry.sender}: ${entry.message}`;
    chatMessages.appendChild(div);
  });
};

if (chatButton && chatPanel) {
  chatButton.addEventListener('click', () => {
    chatPanel.classList.toggle('active');
    renderHistory();
  });
}

if (chatForm) {
  chatForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    const formData = new FormData(chatForm);
    const message = formData.get('message');
    if (!message) return;

    const history = JSON.parse(localStorage.getItem(chatHistoryKey) || '[]');
    history.push({ sender: 'You', message });
    localStorage.setItem(chatHistoryKey, JSON.stringify(history));
    renderHistory();

    const response = await fetch('/api/chat.php', {
      method: 'POST',
      body: formData,
    });

    if (response.ok) {
      const data = await response.json();
      history.push({ sender: 'Kindly Tech', message: data.reply });
      localStorage.setItem(chatHistoryKey, JSON.stringify(history));
      renderHistory();
    }

    chatForm.reset();
  });
}

renderHistory();
