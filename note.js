document.addEventListener("DOMContentLoaded", function () {
    const dateElement = document.getElementById("date");
    const noteElement = document.getElementById("note");
    const saveButton = document.getElementById("save");
    const savedNotesElement = document.getElementById("savedNotes");

    // Load saved notes from localStorage if available
    const savedNotes = JSON.parse(localStorage.getItem("notes")) || [];

    // Function to save notes to localStorage and update the UI
    function saveNotesToLocalStorage() {
        localStorage.setItem("notes", JSON.stringify(savedNotes));
        updateUI();
    }

    // Function to update the UI with saved notes
    function updateUI() {
        savedNotesElement.innerHTML = "";
        savedNotes.forEach((note, index) => {
            const noteHTML = `
                <div>
                    <strong>${note.date}:</strong>
                    ${note.text}
                    <button class="delete" data-index="${index}">Delete</button>
                </div>`;
            savedNotesElement.insertAdjacentHTML("beforeend", noteHTML);
        });

        // Add click event listeners to delete buttons
        const deleteButtons = savedNotesElement.querySelectorAll(".delete");
        deleteButtons.forEach((button) => {
            button.addEventListener("click", function () {
                const index = this.getAttribute("data-index");
                savedNotes.splice(index, 1);
                saveNotesToLocalStorage();
            });
        });
    }

    // Initial UI update
    updateUI();

    saveButton.addEventListener("click", function () {
        const currentDate = new Date();
        const noteText = noteElement.value;
        const formattedDate = currentDate.toLocaleString();

        savedNotes.push({ date: formattedDate, text: noteText });
        saveNotesToLocalStorage();
        noteElement.value = "";
    });
});