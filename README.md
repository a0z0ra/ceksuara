ceksuara - cek suara pemilu 2014
========

TODO LIST:
*) Allow people to upload Catatan hasil penghitungan suara dari TPS
*) Allow people to simply check two images: one from uploaded image and the other from kpu

========
tps/* --> LIST OF ALL TPS IN EACH PROVINCE
========

TOTAL TPS FROM SCRAPING: 475048

CURRENTLY WORKING ON DISCREPANCY ON:
ACEH 9.508 KPU vs 9515 = +7
JAMBI 7.523 KPU vs 7527 = +4
SUMATERA_SELATAN 16.361 KPU VS 14487 = -1874
LAMPUNG 15.010 KPU VS 13155 = -1855
JAWA TIMUR  75.977 KPU VS 75973 = -4
BANTEN 17.693 KPU VS 17625 = -68
NTB 8.552 KPU VS 8562 = +10

KELEBIHAN +21
KEKURANGAN -3801

------------
DARI KPU
------------
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
