var dataTiket = [];

function showDataTiket() {
  var listDataTiket = document.getElementById("table");

  listDataTiket.innerHTML = "";

  if (dataTiket.length === 0) {
    listDataTiket.innerHTML = "<p class='text-center'>Belum ada data</p>";
  } else {
    for (let i = 0; i < dataTiket.length; i++) {
      var btnEdit =
        "<a href='#' class='bg-yellow-500 px-4 py-2 rounded text-white' onclick='editTiket(" +
        i +
        ")'>Edit</a>";
      var btnHapus =
        "<a href='#' class='bg-red-700 px-4 py-2 rounded text-white' onclick='deleteTiket(" +
        i +
        ")'>Hapus</a>";
      listDataTiket.innerHTML += `<div class="border-2 print:border-0 px-3 py-6 rounded-lg">
            <div class="grid grid-cols-2">
                <div>
                    Nama
                </div>
                <div>
                  ${dataTiket[i].nama_pelanggan}
                </div>
            </div>
            <hr class='py-3'/>
            <div class="grid grid-cols-2">
                <div>
                    Tiket
                </div>
                <div>
                  ${dataTiket[i].merek_tiket}
                </div>
            </div>
            <hr class='py-3'/>
            <div class="grid grid-cols-2">
              <div>
                  Jumlah Tiket
              </div>
              <div>
                ${dataTiket[i].jumlah_tiket} Tiket
              </div>
            </div>
            <hr class='py-3'/>
            <div class="grid grid-cols-2">
                <div>
                    
                </div>
                <div>
                    Total ${formatRupiah(dataTiket[i].total, "Rp ")}
                </div>
            </div>
            <hr class='py-3'/>
            <div class="flex space-x-3 justify-end print:hidden">
                ${btnEdit}
                ${btnHapus}
            </div>
        </div>`;
    }
  }

  const sum = dataTiket.reduce((accumulator, object) => {
    return accumulator + object.total;
  }, 0);

  const totalBayar = document.getElementById("total_bayar");
  const totalBayarPrint = document.getElementById("total_bayar_in_print");

  totalBayar.innerHTML = formatRupiah(sum, "Rp");
  totalBayarPrint.innerHTML = formatRupiah(sum, "Rp");
}

function cekTotalHarga(namaPelanggan, jenisTiket, jumlah_tiket) {
  if (jenisTiket == "VIP 3 Day Pass") {
    const total = jumlah_tiket * 200000;
    return {
      nama_pelanggan: namaPelanggan,
      merek_tiket: jenisTiket,
      jumlah_tiket: jumlah_tiket,
      total: total,
    };
  } else if (jenisTiket == "Normal 3 Day Pass") {
    const total = jumlah_tiket * 225000;
    return {
      nama_pelanggan: namaPelanggan,
      merek_tiket: jenisTiket,
      jumlah_tiket: jumlah_tiket,
      total: total,
    };
  } else if (jenisTiket == "Normal Daily Day 1") {
    const total = jumlah_tiket * 80000;
    return {
      nama_pelanggan: namaPelanggan,
      merek_tiket: jenisTiket,
      jumlah_tiket: jumlah_tiket,
      total: total,
    };
  } else if (jenisTiket == "Normal Daily Day 2") {
    const total = jumlah_tiket * 80000;
    return {
      nama_pelanggan: namaPelanggan,
      merek_tiket: jenisTiket,
      jumlah_tiket: jumlah_tiket,
      total: total,
    };
  } else if (jenisTiket == "Normal Daily Day 3") {
    const total = jumlah_tiket * 80000;
    return {
      nama_pelanggan: namaPelanggan,
      merek_tiket: jenisTiket,
      jumlah_tiket: jumlah_tiket,
      total: total,
    };
  }
}

function addTiket() {
  var namaPelanggan = document.getElementById("nama_pelanggan").value;
  var jenisTiket = document.getElementById("jenis_tiket").value;
  var jumlah_tiket = document.getElementById("jumlah_tiket").value;
  if (namaPelanggan === "") {
    alert("Maaf nama pelanggan tidak boleh kosong");
  } else {
    const newDataTiket = cekTotalHarga(namaPelanggan, jenisTiket, jumlah_tiket);
    dataTiket.push(newDataTiket);
    showDataTiket();
  }
}

function editTiket(id) {
  var newjumlah_tiket = prompt("Edit Jumlah Tiket", dataTiket[id].jumlah_tiket);
  const detailNamaPelanggan = dataTiket[id].nama_pelanggan;
  const detailJenisTiket = dataTiket[id].merek_tiket;

  const newDataTiket = cekTotalHarga(
    detailNamaPelanggan,
    detailJenisTiket,
    newjumlah_tiket || dataTiket[id].jumlah_tiket
  );

  dataTiket[id] = newDataTiket;
  showDataTiket();
}

function deleteTiket(id) {
  dataTiket.splice(id, 1);
  showDataTiket();
}

function formatRupiah(angka, prefix) {
  let number_string = angka.toString(),
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
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

showDataTiket();