// require('./bootstrap');
const deleteForm = document.querySelector("form.delete");

if (deleteForm) {
    const button = deleteForm.querySelector("button[type=submit]");
    button.addEventListener("click", (e) => {
        e.preventDefault();
        const answer = window.confirm(
            "Are you sure you want to delete the recipe?"
        );
        if (answer) {
            deleteForm.submit();
        }
    });
}
