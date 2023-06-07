document.getElementById("no_hp").addEventListener("input", function () {
    var input = this.value;
    input = input.replace(/\+|-/g, ""); // Menghapus tanda "+" atau "-"
    input = input.replace(/[^\d]/g, ""); // Menghapus karakter selain digit
    this.value = input;
});
