const alert = document.querySelector('.alert')
const btnClose = alert.querySelector('.btn-close')
btnClose.addEventListener('click', function() {
    alert.remove()
})

// const dateInput = document.getElementById("dob");

// dateInput.addEventListener("input", (event) => {
//     const inputValue = event.target.value;
//     const expectedFormat = /^\d{2}\/\d{2}\/\d{4}$/; // The expected format: DD/MM/YYYY
//     if (!expectedFormat.test(inputValue)) {
//       // The input value is not in the expected format, so try to parse it as a date and format it
//       const inputDate = new Date(inputValue.replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$3-$2-$1')); // Replace slashes with hyphens for parsing
//       if (isNaN(inputDate)) {
//         const year = inputDate.getFullYear();
//         const month = String(inputDate.getMonth() + 1).padStart(2, "0");
//         const day = String(inputDate.getDate()).padStart(2, "0");
//         const formattedDate = `${year}/${month}/${day}`;
//         event.target.value = formattedDate;
//       }
//     }
//   });