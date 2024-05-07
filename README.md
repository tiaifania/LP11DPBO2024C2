# LP11DPBO2024C2

Saya Tia ifania nugrahaningtyas mengerjakan LP11 dalam mata kuliah DPBO untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

berikut adalah desain database
<img width="94" alt="image" src="https://github.com/tiaifania/LP11DPBO2024C2/assets/159092454/14a0fc4c-db7f-4963-a6b6-3d8800c297ac">

tidak terdapat relasi antar tabel, di latihan kali ini spesifikasinya untuk menampilkan kolom email dan telp pada tabel dan menambahkan fitur CRUD. adapun alur dari progrma ini adala index.php adalah halaman yang akan terpanggil di web. di dalam index.php terdapat pengkondisian untuk menampilkan views form add yang mengharuskan pemanggilan add melewati penekanan tombol "add new pasien", form edit yang mengharuskan pemanggilan edit melewati penekanan tombol "edit", atau menampilkan tabel saja. 

di dalam file views terdapat function tampil, function showEditForm, dan function showAddForm. function ShowEdit/AddForm berisikan tampilan form yang akan di berikan kepada template form nanti. di dalam function tampil terdapat juga permisalan jika ada perintah yang masuk selain untuk menampilkan table, seperti untuk menghapus (maka akan memanggil presenter khusus penghapusan, etc. jika tidak ada perintah tambahan, maka hanya menampilkan data dengan format tabel(penampilan menggunakan template).

di dalam file presenter, hanya memanggil semua query yang sudah dibuat di dalam file models.

file models menyimpan semua query database yang dibutuhkan untuk mengolah data
