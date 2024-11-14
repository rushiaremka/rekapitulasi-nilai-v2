function openEditModal(userid) {
    // Buka modal
    document.getElementById("tab1").style.display = "block";
    // Isi hidden input dengan userid
    document.getElementById("editUserId").value = userid;
}

// Tutup modal saat tombol close diklik
document.querySelector('.closeBtn').onclick = function() {
    document.getElementById("tab1").style.display = "none";
}
