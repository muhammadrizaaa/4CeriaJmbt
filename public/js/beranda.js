document.addEventListener("DOMContentLoaded", function() {
    const hargaInput = document.getElementById("harga");

    function formatRupiah(angka) {
        var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan;
    }

    function cleanInput(input) {
        return parseInt(input.replace(/\D/g, ''));
    }

    hargaInput.addEventListener("input", function() {
        var angka = cleanInput(this.value);
        this.value = formatRupiah(angka);
    });
});
