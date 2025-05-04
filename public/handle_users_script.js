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
  
  const renderUserCard = (user) => `
    <div class="bg-white rounded-lg shadow p-4 flex justify-between items-center">
      <div class="flex items-center space-x-4">
        <div class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center font-bold text-white">
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
      <button class="text-gray-500 hover:text-blue-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
  `;
  
  const renderUserList = () => {
    const container = document.getElementById('userList');
    container.innerHTML = users.map(renderUserCard).join('');
  };
  
  renderUserList();
  