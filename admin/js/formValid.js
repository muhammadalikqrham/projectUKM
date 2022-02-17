  function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
      textbox.addEventListener(event, function() {
        if (inputFilter(this.value)) {
          this.oldValue = this.value;
          this.oldSelectionStart = this.selectionStart;
          this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
          this.value = this.oldValue;
          this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        } else {
          this.value = "";
        }
      });
    });
  }
  // setInputFilter(document.getElementById("harga"), function(value) {
  //   return /^\d*$/.test(value);
  // });
  setInputFilter(document.getElementById("no_hp"), function(value) {
    return /^\d*$/.test(value);
  });
  setInputFilter(document.getElementById("panjang"), function(value) {
    return /^\d*$/.test(value);
  });
  setInputFilter(document.getElementById("lebar"), function(value) {
    return /^\d*$/.test(value);
  });
  setInputFilter(document.getElementById("tinggi"), function(value) {
    return /^\d*$/.test(value);
  });
  setInputFilter(document.getElementById("penjual"), function(value) {
    return /^[a-z]*$/i.test(value);
  });

  var rupiah = document.getElementById("harga");
  rupiah.addEventListener("keyup", function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, "Rp. ");
  });

  /* Fungsi formatRupiah */
  function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
      split = number_string.split(","),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
      separator = sisa ? "." : "";
      rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? rupiah : "";
  }