ceksuara
========

cek suara pemilu 2014

Provinsi -> kabupaten/kota -> kecamatan -> kelurahan/desa -> TPS
Jumlah provinsi: 33
Jumlah kabupaten/kota: 497
Jumlah kecamatan: 6.995
Jumlah kelurahan/desa: 80.493
Jumlah TPS: 478.828

URL gambar:
http://scanc1.kpu.go.id/viewp.php?f=005177200704.jpg
IDnya 005177200704 -->
	0051772 = nomer id kelurahan/desa,
	007 = no tps di kelurahan/desa,
	04 = gambar ke 4 (range=01-04)

Halaman untuk discrape:
http://pilpres2014.kpu.go.id/c1.php?cmd=select&parent=2

Ganti parent id jadi kalau provinsi jakarta, parentId = 25823 dan url jadi: http://pilpres2014.kpu.go.id/c1.php?cmd=select&parent=25823

TODO LIST:
*) Allow people to upload Catatan hasil penghitungan suara dari TPS
*) Allow people to simply check two images: one from uploaded image and the other from kpu