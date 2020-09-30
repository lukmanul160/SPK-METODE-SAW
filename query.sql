-- Normalisasi
SELECT
	nilai.kd_kriteria,
    kriteria.sifat,
    (SELECT bobot FROM model WHERE kd_kriteria=kriteria.kd_kriteria AND jenis_bantuan=bantuan.jenis_bantuan) AS bobot,
	ROUND(IF(kriteria.sifat='max', MAX(nilai.nilai), MIN(nilai.nilai)), 1) AS normalization
FROM nilai
JOIN kriteria USING(kd_kriteria)
JOIN bantuan ON kriteria.jenis_bantuan=bantuan.jenis_bantuan
WHERE bantuan.jenis_bantuan=1
GROUP BY nilai.kd_kriteria

-- Rangking
SELECT
	(SELECT nama FROM keluarga WHERE NIK=klg.NIK) AS nama,
	(SELECT nim FROM keluarga WHERE NIK=klg.NIK) AS NIK,
	(SELECT tahun_mengajukan FROM keluarga WHERE NIK=klg.NIK) AS tahun,
	SUM(
		IF(
				c.sifat = 'max',
				nilai.nilai / c.normalization,
				c.normalization / nilai.nilai
		) * c.bobot
	) AS rangking
FROM
	nilai
	JOIN keluarga klg USING(NIK)
	JOIN (
		SELECT
			nilai.kd_kriteria,
		    kriteria.sifat,
		    (SELECT bobot FROM model WHERE kd_kriteria=kriteria.kd_kriteria AND jenis_bantuan=bantuan.jenis_bantuan) AS bobot,
			ROUND(IF(kriteria.sifat='max', MAX(nilai.nilai), MIN(nilai.nilai)), 1) AS normalization
		FROM nilai
		JOIN kriteria USING(kd_kriteria)
		JOIN bantuan ON kriteria.jenis_bantuan=bantuan.jenis_bantuan
		WHERE bantuan.jenis_bantuan=1
		GROUP BY nilai.kd_kriteria
	) c USING(kd_kriteria)
WHERE jenis_bantuan=1
GROUP BY nilai.NIK
ORDER BY rangking DESC

-- Rangking dengan menampilkan nilai perkriteria
SELECT
	(SELECT nama FROM keluarga WHERE NIK=klg.NIK) AS nama,
	(SELECT NIK FROM keluarga WHERE NIK=klg.NIK) AS NIK,
	(SELECT tahun_mengajukan FROM keluarga WHERE NIK=klg.NIK) AS tahun,
	SUM(
		IF(
			c.kd_kriteria=1,
			IF(c.sifat='max', nilai.nilai/c.normalization, c.normalization / nilai.nilai), 0
		)
	) AS C1,
	SUM(
		IF(
			c.kd_kriteria=2,
			IF(c.sifat='max', nilai.nilai/c.normalization, c.normalization / nilai.nilai), 0
		)
	) AS C2,
	SUM(
		IF(
			c.kd_kriteria=3,
			IF(c.sifat='max', nilai.nilai/c.normalization, c.normalization / nilai.nilai), 0
		)
	) AS C3,
	SUM(
		IF(
				c.sifat = 'max',
				nilai.nilai / c.normalization,
				c.normalization / nilai.nilai
		) * c.bobot
	) AS rangking
FROM
	nilai
	JOIN keluarga klg USING(NIK)
	JOIN (
		SELECT
			nilai.kd_kriteria,
		    kriteria.sifat,
		    (SELECT bobot FROM model WHERE kd_kriteria=kriteria.kd_kriteria AND jenis_bantuan=bantuan.jenis_bantuan) AS bobot,
			ROUND(IF(kriteria.sifat='max', MAX(nilai.nilai), MIN(nilai.nilai)), 1) AS normalization
		FROM nilai
		JOIN kriteria USING(kd_kriteria)
		JOIN bantuan ON kriteria.jenis_bantuan=bantuan.jenis_bantuan
		WHERE bantuan.jenis_bantuan=1
		GROUP BY nilai.kd_kriteria
	) c USING(kd_kriteria)
WHERE jenis_bantuan=1
GROUP BY nilai.NIK
ORDER BY rangking DESC
