function submitReport() {
    let reportText = document.getElementById("reportText").value;
        if (reportText.trim() === "") {
            alert("Please enter a report before submitting.");
            return;
        }
    alert("Your report has been submitted to the admin.");
        document.getElementById("reportText").value = "";
}