const employeePhotoPreview = document.getElementById('employeePhotoPreview');
const employeePhotoInput = document.getElementById('employeePhoto');
const birthdayInput = document.getElementById('birthday');
const ageInput = document.getElementById('age');

employeePhotoInput.addEventListener('change', () => {
    const file = employeePhotoInput.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            employeePhotoPreview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});


birthdayInput.addEventListener('change', () => {
    const birthday = new Date(birthdayInput.value);
    const today = new Date();
    let age = today.getFullYear() - birthday.getFullYear();
    const month = today.getMonth() - birthday.getMonth();
    if (month < 0 || (month === 0 && today.getDate() < birthday.getDate())) {
        age--;
    }
    ageInput.value = age;
});


function getEmployeeData() {
    const editEmployeeId = localStorage.getItem("editEmployeeId");
    if (editEmployeeId) {
        const employees = JSON.parse(localStorage.getItem("employees")) || [];
        return employees.find(emp => emp.Employee_Id === editEmployeeId);
    }
    return null;
}


const employeeData = getEmployeeData();
if (employeeData) {
    document.getElementById('employeeId').value = employeeData.Employee_Id;
    document.getElementById('firstName').value = employeeData.First_Name;
    document.getElementById('lastName').value = employeeData.Last_Name;
    document.getElementById('email').value = employeeData.Email;
    document.getElementById('phoneNumber').value = employeeData.Phone_Number;
    document.getElementById('jobPosition').value = employeeData.Job_Position;
    document.getElementById('employeeStatus').value = employeeData.Status;
    document.getElementById('birthday').value = employeeData.Birthday;
    document.getElementById('age').value = employeeData.Age;
    document.getElementById('employeePhotoPreview').src = employeeData.Photo || 'placeholder.jpg';
}


document.getElementById('employeeForm').addEventListener('submit', (event) => {
    event.preventDefault(); 

    const ageValue = ageInput.value;
    if (!ageValue) {
        alert('Please enter a birthday to calculate age.');
        return;
    }

    const employee = {
        Employee_Id: document.getElementById("employeeId").value,
        First_Name: document.getElementById("firstName").value,
        Last_Name: document.getElementById("lastName").value,
        Email: document.getElementById("email").value,
        Phone_Number: document.getElementById("phoneNumber").value,
        Job_Position: document.getElementById("jobPosition").value,
        Status: document.getElementById("employeeStatus").value,
        Birthday: document.getElementById("birthday").value,
        Age: ageInput.value,
        Photo: employeePhotoPreview.src !== 'placeholder.jpg' ? employeePhotoPreview.src : ''
    };

    let employees = JSON.parse(localStorage.getItem("employees")) || [];

    const editEmployeeId = localStorage.getItem("editEmployeeId");
    if (editEmployeeId) {
      
        employees = employees.map(emp => {
            if (emp.Employee_Id === editEmployeeId) {
                return employee;
            }
            return emp;
        });
        localStorage.removeItem("editEmployeeId"); 
    } else {
        
        employees.push(employee);
    }

    localStorage.setItem("employees", JSON.stringify(employees));

    alert(editEmployeeId ? "Employee updated successfully!" : "Employee added successfully!");

    window.location.href = "EmployeeDetails.blade.php";
});
