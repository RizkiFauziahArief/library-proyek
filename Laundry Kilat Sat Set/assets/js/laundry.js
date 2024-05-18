var dataLaundry = [];

function ribuan(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function showLaundry() {
  var listLaundry = document.getElementById("list-laundry");
  listLaundry.innerHTML = "";
  var totalText = document.getElementById("total");
  totalText.innerHTML = 0;
  totalHarga = 0;
  dataLaundry.map((data, i) => {
    var btnEdit = `<a href='#' onclick='editLaundry(${i})'>Edit</a>`;
    var btnHapus = `<a href='#' onclick='hapusLaundry(${i})'>Hapus</a>`;
    var harga = 0;
    var hargaAwal = 0;

    if (data.jenisLaundry == "Pakaian") {
      if (data.berat > 5) {
        harga = (data.berat - 1) * 12000;
        hargaAwal = data.berat * 12000;
      } else {
        harga = data.berat * 12000;
      }
    } else if (data.jenisLaundry == "Jas") {
      if (data.berat > 5) {
        harga = (data.berat - 1) * 35000;
        hargaAwal = data.berat * 35000;
      } else {
        harga = data.berat * 35000;
      }
    } else if (data.jenisLaundry == "Selimut") {
      harga = data.berat * 50000;
    }else if (data.jenisLaundry == "Karpet") {
      harga = data.berat * 88000;
    }

    listLaundry.innerHTML += `<li> ${data.jenisLaundry}, ${data.berat}kg, ${
      hargaAwal !== 0
        ? `<s>Rp.${ribuan(hargaAwal)},-</s> <b>Rp.${ribuan(harga)},-</b>`
        : `Rp.${ribuan(harga)},-`
    }  [${btnEdit}] [${btnHapus}]`;
    totalHarga += harga;
  });
  totalText.innerHTML = `Rp.${ribuan(totalHarga)},-`;
}

function tambahLaundry() {
  var namaLaundry = document.getElementById("namaLaundry");
  var beratLaundry = document.querySelector("input[name=berat]");
  if (
    namaLaundry.value == "Pakaian" ||
    namaLaundry.value == "Jas" ||
    namaLaundry.value == "Selimut" ||
    namaLaundry.value == "Karpet"
  ) {
    dataLaundry.push({
      jenisLaundry: namaLaundry.value,
      berat: beratLaundry.value,
    });
    showLaundry();
  }
}

function editLaundry(id) {
  var namaLaundryBaru = prompt(
    "Jenis Laundry",
    dataLaundry[id].jenisLaundry
  );
  var beratLaundryBaru = prompt("Berat Laundry", dataLaundry[id].berat);

  dataLaundry[id].jenisLaundry = namaLaundryBaru;
  dataLaundry[id].berat = beratLaundryBaru;
  showLaundry();
}

function hapusLaundry(id) {
  dataLaundry.splice(id, 1);
  showLaundry();
}

showLaundry();
