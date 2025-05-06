// Sample users data
const users = [
  {
    id: 1,
    name: "Ava Sharma",
    email: "ava@example.com",
    created_at: "2024-01-15",
    updated_at: "2024-04-01"
  },
  {
    id: 2,
    name: "Ben Carter",
    email: "ben@example.com",
    created_at: "2024-02-20",
    updated_at: "2024-04-02"
  },
  {
    id: 3,
    name: "Chloe Davis",
    email: "chloe@example.com",
    created_at: "2024-03-10",
    updated_at: "2024-04-03"
  },
  {
    id: 4,
    name: "Daniel Lee",
    email: "daniel@example.com",
    created_at: "2024-01-10",
    updated_at: "2024-04-04"
  }
];

// Function to render each user's card
const renderUserCard = (user) => `
  <div class="user-card bg-white border border-gray-200 rounded-lg shadow p-4 flex justify-between items-start relative" data-user-id="${user.id}">
    <div class="flex items-center space-x-4">
      <div class="w-12 h-12 rounded-full bg-gray-400 text-white flex items-center justify-center font-bold">
        ${user.name[0]}
      </div>
      <div>
        <div class="text-lg font-semibold">${user.name}</div>
        <div class="text-sm text-gray-600">${user.email}</div>
        <div class="text-xs text-gray-400 mt-1">
          Created: ${user.created_at} | Updated: ${user.updated_at}
        </div>
      </div>
    </div>
    <div class="relative">
      <button class="hamburger-btn text-gray-500 hover:text-blue-600 mt-6 mr-3" data-id="${user.id}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>

      <button class="delete-btn absolute right-0 mt-1 bg-red-500 text-white text-xs px-5 py-5 rounded hidden" data-id="${user.id}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
        </svg>
      </button>
    </div>
  </div>
`;

// Function to render the list of users
const renderUserList = () => {
  const container = document.getElementById('userList');
  container.innerHTML = users.map(renderUserCard).join('');
  setupEventListeners();
};

// Event listener for opening the modal
document.getElementById('openModalBtn').addEventListener('click', () => {
  document.getElementById('userModal').classList.add('show');
});

// Event listener for closing the modal
document.getElementById('closeModalBtn').addEventListener('click', () => {
  document.getElementById('userModal').classList.remove('show');
});

// Event listener for form submission to add a user
document.getElementById('userForm').addEventListener('submit', (e) => {
  e.preventDefault();
  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  const newUser = {
    id: users.length + 1,  // Generate a new ID (could be handled better in a real scenario)
    name,
    email,
    created_at: new Date().toISOString().split('T')[0], // Format to YYYY-MM-DD
    updated_at: new Date().toISOString().split('T')[0]
  };

  users.push(newUser);
  renderUserList();
  document.getElementById('userModal').classList.remove('show'); // Close the modal
});

// Event listeners for hamburger and delete buttons
const setupEventListeners = () => {
  document.querySelectorAll('.hamburger-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.stopPropagation(); // Prevent event bubbling to document
      const userId = btn.dataset.id;
      const card = document.querySelector(`.user-card[data-user-id="${userId}"]`);
      const deleteBtn = card.querySelector('.delete-btn');
      deleteBtn.classList.toggle('hidden');
    });
  });

  document.querySelectorAll('.delete-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.stopPropagation(); // Prevent event bubbling to document
      const id = parseInt(btn.dataset.id);
      const index = users.findIndex(u => u.id === id);
      if (index !== -1) {
        users.splice(index, 1);  // Remove the user from the array
        renderUserList();  // Re-render the list
      }
    });
  });

  // Event listener to detect clicks anywhere in the document and hide all delete buttons
  document.addEventListener('click', () => {
    document.querySelectorAll('.delete-btn').forEach(deleteBtn => {
      deleteBtn.classList.add('hidden'); // Hide all delete buttons when clicking anywhere
    });
  });
};

// Initial load of user list
renderUserList();
