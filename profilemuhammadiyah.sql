-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2025 pada 09.48
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profilemuhammadiyah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata_pimpinans`
--

CREATE TABLE `biodata_pimpinans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `position` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `biography` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `biodata_pimpinans`
--

INSERT INTO `biodata_pimpinans` (`id`, `title`, `slug`, `position`, `image`, `biography`, `created_at`, `updated_at`) VALUES
(1, 'test slug1', 'test-slug', 1, 'post-images/1732790073_WhatsApp Image 2024-11-21 at 05.51.48_d7454135.jpg', '<div>test</div>', '2024-11-28 03:34:33', '2024-11-28 05:49:10'),
(3, 'Salmon', 'salmon', 2, 'post-images/1732798477_Fakultas-Teknik-Unsoed.jpeg.webp', '<div>wong kedungpring</div>', '2024-11-28 05:54:37', '2024-11-28 05:54:37'),
(4, 'test kategori', 'test-kategori', 2, NULL, '<div>mkknkkm</div>', '2024-12-03 11:42:39', '2024-12-03 11:42:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Hukum Islam', 'hukum-islam', '2024-10-19 03:03:24', '2024-10-19 03:03:24'),
(2, 'Web Design', 'web-design', '2024-10-19 03:03:24', '2024-10-19 03:03:24'),
(3, 'Personal', 'personal', '2024-10-19 03:03:24', '2024-10-19 03:03:24'),
(11, 'Kabar', 'kabar', '2024-11-10 09:43:32', '2024-11-10 09:43:32'),
(13, 'Bakti Sosial Idul Adha', 'bakti-sosial-idul-adha', '2024-12-12 20:00:31', '2024-12-12 20:00:31'),
(14, 'Syiar Lomba Takbir', 'syiar-lomba-takbir', '2024-12-12 20:01:01', '2024-12-12 20:01:01'),
(15, 'Prestasi TK ABA', 'prestasi-tk-aba', '2024-12-12 20:02:30', '2024-12-12 20:02:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id`, `title`, `slug`, `image`, `description`, `quantity`, `location`, `created_at`, `updated_at`, `location_id`) VALUES
(1, 'test', 'test', 'post-images/1733252232_bennie-bates-j7l_GR9WeZE-unsplash.jpg', '<div>kmkmkm</div>', 3, 'sumpiuh', '2024-12-03 03:25:36', '2024-12-03 11:57:12', 1),
(3, 'test lingkup', 'test-lingkup', NULL, '<div>,mknkin</div>', 4, 'kmj', '2024-12-03 13:11:53', '2024-12-03 13:11:53', 1),
(4, 'Inventaris Aisyiyah', 'inventaris-aisyiyah', 'post-images/1733587336_bennie-bates-j7l_GR9WeZE-unsplash.jpg', '<div>testt</div>', 6, 'bms', '2024-12-07 09:02:18', '2024-12-07 09:02:18', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kajians`
--

CREATE TABLE `kajians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `excerpt` text NOT NULL,
  `body` text NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `click_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `speaker` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kajians`
--

INSERT INTO `kajians` (`id`, `category_id`, `user_id`, `title`, `slug`, `image`, `excerpt`, `body`, `published_at`, `created_at`, `updated_at`, `document`, `click_count`, `speaker`) VALUES
(1, 1, 3, 'Ex nostrum nesciunt harum.', 'odit-unde-amet-adipisci-enim-aperiam', NULL, 'Vel quia sunt ea reiciendis voluptate. Est doloribus recusandae sed sequi cumque. Saepe dolor distinctio eaque inventore est dignissimos minima qui.', '<p>Eius in quod veritatis. Eveniet hic impedit dolores officiis tenetur labore. Voluptatem repudiandae vero quia voluptas quis aut.</p><p>Perspiciatis esse explicabo numquam animi dicta dolor quasi. Labore ut enim exercitationem velit architecto. Ipsam qui doloremque dolorum ut aut consequatur et.</p><p>Atque omnis et repellat voluptates in. Libero optio quisquam beatae quis ut. Possimus dolores saepe ut.</p><p>Velit beatae odit nostrum quibusdam culpa quisquam velit. Possimus deleniti quisquam iure et et maiores. Dolor repellat numquam voluptas odit et.</p><p>Rem accusamus autem dignissimos odit provident vitae ducimus et. Et dolorum voluptatem fuga itaque est doloremque. Voluptatem aut sapiente est qui et.</p><p>Iusto et officia doloribus. Harum velit itaque a. Dolores similique non est similique voluptatibus. Voluptas eaque dolor autem esse et dignissimos.</p><p>Qui omnis culpa tempora facilis dolor non. Quisquam sint autem voluptates impedit consequatur repellendus natus. Aut incidunt explicabo pariatur nostrum velit dicta.</p><p>A eveniet aut rerum. Perferendis adipisci quae labore quisquam et quae asperiores quaerat. Minus delectus rerum qui dolorum.</p><p>Repellat autem odio perferendis et. Ex impedit distinctio deleniti quam unde qui. Quia nobis quidem perferendis ad.</p>', NULL, '2024-11-02 18:26:15', '2024-11-02 18:26:15', '', 0, ''),
(2, 1, 2, 'Quaerat nihil est.', 'non-qui-commodi-odit-ab-placeat', NULL, 'Voluptatibus perspiciatis doloribus animi qui ut iusto rerum. Atque numquam sint commodi. Minus nulla necessitatibus sunt sint. Eum minima quam qui alias aliquid sed sint. Et esse adipisci et fuga architecto rerum.', '<p>Placeat nulla tenetur perferendis expedita. Nostrum omnis possimus accusantium ut. Atque molestiae nisi ut quia rerum earum ut. Nihil et ut iusto quae.</p><p>Deleniti pariatur illo pariatur velit. Dolorem repellat animi nihil laboriosam veritatis. Doloribus aliquam tenetur dignissimos numquam in dolor et.</p><p>Illum architecto eligendi sunt fugit. Fugiat impedit placeat omnis vitae ut quos vel nihil. Aut rerum dolores et voluptas sit repellendus voluptatem.</p><p>Est ex fugiat hic facere. Dicta quis totam natus. Illum ea delectus ad consequatur atque distinctio asperiores.</p><p>Voluptatibus eveniet aspernatur quod. Officia a aut ducimus aliquid. Praesentium accusamus dolore ut ab aspernatur voluptatum assumenda quas.</p><p>Ut illo quibusdam laudantium. Sit eaque recusandae rerum assumenda. Voluptatem et perferendis et ullam.</p>', NULL, '2024-11-02 18:26:15', '2024-11-02 18:26:15', '', 0, ''),
(3, 2, 2, 'Delectus rerum eos.', 'ea-qui-enim-autem-recusandae-nobis-distinctio-quo', NULL, 'Sit debitis eius libero quibusdam perferendis incidunt similique. Rerum est temporibus rerum commodi saepe. Error velit impedit voluptatem tempore aut enim earum. Sint dolore excepturi est nesciunt placeat quo.', '<p>Laboriosam nam illum quia ad. Nam consectetur est et non animi dolorum incidunt. Et ut harum quisquam.</p><p>Sunt et consequatur rerum delectus. Ut neque ipsum ab temporibus voluptatum.</p><p>Tempora repellendus voluptas animi quisquam id rem. Sit autem et eum sunt est nihil. Asperiores deserunt aut et saepe. Ea asperiores quae quo rerum.</p><p>Magnam amet odio blanditiis nam reiciendis quisquam. Rem tempora sunt iure in omnis. Dolores et beatae veritatis qui.</p><p>Corrupti ipsam dolores distinctio molestiae. Consequatur voluptates corporis corrupti officia. Quia alias ipsum perspiciatis quasi ex.</p><p>Aliquid iste cum molestiae. Ullam dolor et nesciunt sit delectus nam repudiandae. Sed earum expedita nulla commodi quia. Possimus quisquam qui voluptatem veritatis.</p>', NULL, '2024-11-02 18:26:15', '2024-11-27 01:51:28', '', 2, ''),
(4, 2, 1, 'Cumque voluptates unde excepturi architecto enim aperiam.', 'dignissimos-eum-officia-et-sapiente-quia-rerum', NULL, 'Consequatur amet rem et velit. Est a nobis unde. Nemo minima est dolor culpa omnis asperiores et.', '<p>In possimus eius sunt assumenda ratione repellat. Sit et aut suscipit. Dicta dolores dolores pariatur ullam amet.</p><p>Molestiae fugiat libero neque qui cumque est. Non consequatur doloribus praesentium. Qui omnis corporis neque qui vel exercitationem.</p><p>Et totam nesciunt quia ab non. Aut voluptatum consequatur beatae natus. Ipsum est illum sed consectetur. Autem voluptas rerum iste ad.</p><p>Doloribus illo quaerat cumque fugit. Vitae est soluta ipsum eaque. Et animi iste aperiam.</p><p>Consectetur quia labore exercitationem consequatur beatae sunt. Provident minima quis earum ipsam iste sapiente exercitationem officiis. Non sit et quia. Voluptatum qui commodi et et.</p><p>Reiciendis quae et esse architecto fuga aut. Eligendi asperiores occaecati aut impedit esse repellendus. Et ut unde aspernatur repudiandae.</p><p>Et amet enim iste dicta natus ex itaque. Et fuga tempora rem repellendus sed dignissimos modi omnis. In quam sapiente tenetur voluptatum qui minus ut. Quo nemo blanditiis voluptatem non aut. Doloribus doloremque iusto ab quibusdam.</p><p>A dolorem error molestiae dolorem laboriosam ut. Voluptates facere autem modi placeat dolores quo voluptatem repudiandae. Quis animi id aliquid. Itaque deleniti autem officiis itaque dicta autem nulla.</p><p>Accusantium sed non aliquam aspernatur illum ut dolorem. Placeat sit ut quis mollitia omnis est nihil deleniti.</p>', NULL, '2024-11-02 18:26:15', '2024-11-27 01:48:43', '', 2, ''),
(5, 1, 3, 'Et occaecati sit officia consectetur sapiente.', 'dicta-velit-mollitia-alias-est-et-quaerat-vitae', NULL, 'Sed explicabo et molestiae ut minus vel nam. Est placeat consectetur aut qui. Itaque et dicta consequatur iste nam odio natus. Veniam optio et accusamus et ut voluptatibus.', '<p>Officia similique dolor animi cumque quis maiores ut. Consectetur dolor recusandae fuga et quod autem repellendus.</p><p>Inventore delectus nemo voluptatem voluptatem. Minus tempora esse adipisci rerum autem et voluptatem. Quis ut qui exercitationem autem sit vel. Nostrum et sapiente rerum vel ad ad delectus.</p><p>Deleniti excepturi odio voluptas deserunt alias necessitatibus nihil. Expedita unde velit officia et non consequatur. Eligendi minima facere ut optio.</p><p>Facere voluptates exercitationem ratione dolorem est ratione sint. Commodi sed ea vel consequatur mollitia aliquid aut aperiam. Incidunt ad veritatis eveniet sit. Atque et sed ratione cum tempora inventore.</p><p>Totam et sapiente voluptates. Vel minima accusamus facilis eos iure qui. Voluptates animi doloremque enim aut. Nam officiis labore qui perspiciatis.</p><p>Voluptas ut cumque nostrum quisquam. Tenetur sunt maiores quia qui rerum molestiae.</p>', NULL, '2024-11-02 18:26:15', '2024-11-02 18:26:15', '', 0, ''),
(6, 1, 3, 'Voluptatem enim quia minus.', 'ut-recusandae-id-tenetur-consequatur-ex-necessitatibus-ut', NULL, 'Labore omnis sint aut velit cum sit cum et. Molestiae facilis necessitatibus quam enim rerum eos. Illum voluptates dicta enim soluta rerum ad.', '<p>Omnis perspiciatis omnis ut fugit eum. Voluptas veritatis sunt sapiente unde voluptatem facere. Praesentium minus cumque vitae velit est molestiae. Sed provident asperiores non quidem sint. Nihil pariatur dolorem aut nemo.</p><p>Aperiam eum quam molestiae expedita qui hic. Aut molestias iure tempora quod itaque et cupiditate. Aspernatur et cupiditate distinctio voluptatum dolorem nostrum. Dolor sunt minima mollitia quia et dolor asperiores.</p><p>Neque cumque rerum voluptas nobis quia dignissimos. Aut necessitatibus est dolore voluptates. Nihil ratione explicabo laborum qui consequatur similique corporis. Ducimus adipisci odit soluta nemo.</p><p>Reiciendis eligendi laudantium nihil qui corrupti accusamus illum. Provident aliquid ab quis totam delectus ullam. Eos eum deserunt sed error deleniti enim et.</p><p>Libero at quasi ut sed at ipsum. Inventore enim alias possimus aperiam minima deserunt et. Ipsa fuga tempore quisquam.</p><p>Beatae corrupti est et aut mollitia nobis. Earum quo in recusandae doloremque est. Est quo dolorum cum pariatur. Sed aut magnam ipsa id soluta aut.</p><p>Nihil sed neque velit accusantium ipsum et. Fuga quo aliquid aliquid nesciunt libero. Fugiat reiciendis in eaque in aut quae.</p>', NULL, '2024-11-02 18:26:15', '2024-11-02 18:26:15', '', 0, ''),
(7, 1, 3, 'Enim omnis quo vero nobis.', 'deleniti-quod-doloremque-est-aut-consequatur', NULL, 'Neque quasi voluptatibus molestiae nam sequi inventore. Explicabo quia illum dolor saepe aut doloribus iure. Magnam ut animi praesentium et.', '<p>Dolore minima qui omnis officiis aut. Sed velit debitis cumque eum voluptatum nihil. Eum et cum ea beatae aperiam atque.</p><p>Et facere qui sed aut autem nihil. Quibusdam earum id occaecati vel. Expedita unde dolor odio tempora. Qui aspernatur quo voluptatibus reprehenderit voluptate rerum temporibus.</p><p>Unde voluptates quidem aut quibusdam consequatur distinctio modi. Blanditiis maiores sunt et error. Exercitationem ex tempora commodi. Dolores explicabo non unde dolorum necessitatibus sed.</p><p>Non cupiditate ipsam neque placeat voluptatem. Est ullam cum suscipit. Consectetur impedit qui voluptates labore eos nihil. Repudiandae aut quis labore quas molestiae fugiat.</p><p>Hic maiores sint est quia et sit. Omnis qui blanditiis et. Dignissimos nesciunt ea asperiores et veritatis eos sed. Maiores ad aut aut corrupti ut.</p>', NULL, '2024-11-02 18:26:15', '2024-11-02 18:26:15', '', 0, ''),
(8, 2, 1, 'Nam laboriosam nemo ullam.', 'ab-et-impedit-omnis-sint', NULL, 'Qui illo dignissimos quibusdam modi quibusdam qui officiis officiis. Non veniam explicabo ut eligendi voluptatem ea aliquid deserunt. Ratione ipsum eveniet nobis. Sed dolore atque assumenda consequuntur molestiae fuga vitae et. Sit id provident esse dolore.', '<p>Ad qui adipisci ut et ab. Impedit est enim odit eum deleniti. Numquam saepe et nisi corporis totam accusantium doloribus. Debitis in et officiis.</p><p>Corporis sunt non commodi asperiores voluptatem voluptas. Consequuntur ea voluptas eveniet recusandae qui aspernatur adipisci. Optio provident sint reprehenderit voluptates dicta.</p><p>Expedita exercitationem aut maiores qui maiores odit dicta. Quas dolorum quibusdam eos accusantium. Reiciendis ipsum nobis accusantium quasi molestiae corrupti. Cumque veritatis illo sapiente culpa consequatur. Error quia pariatur quis perferendis quia voluptatem tenetur.</p><p>Illum dolor repellendus quia tempore. Voluptas eius est quisquam amet quas possimus nobis distinctio. Error aperiam voluptatem corporis magnam nisi. Vel ratione incidunt necessitatibus voluptatem dolore.</p><p>Et perspiciatis error hic cupiditate velit inventore. Vitae cupiditate sit ipsa. Aperiam aut nisi in aut autem vel voluptatem. Dolor aut enim perferendis qui corporis ex.</p><p>Ut aliquam aliquid et autem soluta et. Ducimus enim adipisci maxime corporis eius. Sequi maiores error aut nam tempora omnis. Et consequatur atque est ut amet.</p><p>Facilis sed facilis qui in molestias in. Atque ab adipisci laborum accusamus et impedit modi. Sequi et animi praesentium.</p><p>Aut corporis distinctio tenetur dolorem officiis deleniti. Architecto ullam animi ipsa debitis quia sequi. Ab dignissimos labore deleniti molestias distinctio.</p>', NULL, '2024-11-02 18:26:15', '2024-11-02 18:26:15', '', 0, ''),
(9, 1, 1, 'Dolorem iusto impedit recusandae.', 'dolorum-sunt-repellendus-facilis-eaque-quia', NULL, 'Doloremque architecto neque pariatur accusantium. Explicabo quo sit sint mollitia deserunt mollitia qui. Similique consequatur in dicta alias.', '<p>Itaque unde pariatur dolore architecto quidem. Quia et ea fugiat possimus praesentium itaque. Ut occaecati beatae quis nihil.</p><p>Distinctio aspernatur odio dignissimos distinctio. Sed ad expedita aliquam voluptatem id sapiente. Mollitia nam quae voluptates esse nulla dolor accusantium. Odio ea quam temporibus suscipit.</p><p>Non nobis temporibus enim temporibus veritatis. Rerum libero omnis ut totam accusamus et. Possimus fugit ratione repellendus accusantium.</p><p>Perspiciatis eum aut sit ut ducimus. Dolore voluptatem tenetur quae nihil eveniet. Perferendis libero voluptatibus velit qui corrupti dolores modi.</p><p>Corrupti cumque temporibus et. Cupiditate laboriosam est at nulla eius. Deserunt pariatur qui hic repudiandae dignissimos dicta.</p><p>Doloribus est et eius et doloremque quod ut beatae. Alias officia assumenda debitis ea laborum. Non neque ut voluptatibus illum.</p><p>Aut voluptatum blanditiis quisquam quo non. Fuga numquam molestiae id laborum sunt asperiores. Harum sunt tempora nostrum exercitationem architecto quisquam. Aut commodi nobis sunt sed a dolorem quam voluptas. Illum sit quasi excepturi magnam.</p><p>Et ut cumque et eaque. Autem quia accusantium impedit soluta deserunt veritatis. Exercitationem ad fugit repudiandae facere numquam. Eius aut voluptatem doloremque ullam.</p><p>At aliquam expedita a dicta. Est sapiente est pariatur omnis a qui. Quis perferendis expedita corrupti quos.</p><p>Inventore beatae qui quaerat ullam qui. Possimus molestiae excepturi quaerat ut facere non qui.</p>', NULL, '2024-11-02 18:26:15', '2024-11-02 18:26:15', '', 0, ''),
(10, 3, 1, 'Asperiores Bismillah est.', 'eum-eaque-quia-harum', 'post-images/xB7S5ML1H6jbnpvGWYtuB1wGe2TRiUMJHCSY2QLs.png', 'Minima quasi molestias voluptate minus qui repellat fugiat voluptatem. Dolorum facilis velit vero sit id ut qui. Repudiandae et itaque dignissimos voluptatem assumenda. Fuga dolore quas aut.Labore nem...', '<div>Minima quasi molestias voluptate minus qui repellat fugiat voluptatem. Dolorum facilis velit vero sit id ut qui. Repudiandae et itaque dignissimos voluptatem assumenda. Fuga dolore quas aut.<br><br></div><div>Labore nemo sed veniam quos accusamus sit. Animi et vitae consequatur. Voluptatem nulla velit soluta rem et reiciendis.<br><br></div><div>Ipsum sit odio amet rerum fugiat. Laudantium blanditiis architecto necessitatibus facere. Nobis ad ut pariatur debitis. Minima est sunt laborum aut sed omnis velit. Vitae corporis cum iusto eligendi deleniti.<br><br></div><div>Enim at a et laboriosam aut iste. Aut reiciendis est distinctio quod. Similique cum voluptatem omnis exercitationem eum recusandae eos. Est qui quis perferendis doloribus.<br><br></div><div>Facere id culpa et. Rerum architecto reprehenderit pariatur nesciunt sit officiis odit. Recusandae laudantium officiis eligendi quisquam ullam vero qui. Possimus vero exercitationem exercitationem reiciendis.<br><br></div><div>Corporis earum culpa animi deserunt et minus quod eos. Est nam accusamus laudantium vitae. Adipisci laboriosam at impedit voluptatem ea est neque. Sit libero vitae labore porro.<br><br></div><div>Velit maiores unde maxime sit ad facere. Molestias excepturi quo rerum et sit hic.<br><br></div><div>Suscipit harum inventore nesciunt quod quod doloribus accusantium. Cumque aut suscipit fuga recusandae illum. Nobis dolor et sequi et illum.<br><br></div><div>Sunt aliquid dolorem alias maiores. Vitae doloremque commodi odit aliquid ad molestias et. Quia minus aut rem accusantium tenetur ut.<br><br></div>', NULL, '2024-11-02 18:26:15', '2024-12-07 08:13:40', '', 1, ''),
(12, 3, 1, 'coba dokumen', 'coba-dokumen', NULL, 'kmlkmlmo', '<div>kmlkmlmo</div>', NULL, '2024-11-03 23:13:13', '2024-11-26 00:04:48', 'sK3wPdzWIybLrBDjl3Z836xjiwRMiLnCWDAXf9gr.pdf', 2, ''),
(16, 3, 1, 'coba file', 'coba-file', NULL, 'mnnmkmklih', '<div>mnnmkmklih</div>', NULL, '2024-11-04 03:04:11', '2024-11-07 18:35:20', 'C:\\xampp\\tmp\\phpE5DF.tmp', 6, ''),
(17, 3, 1, 'cobaa', 'cobaa', NULL, 'jihuiguy', '<div>jihuiguy</div>', NULL, '2024-11-04 03:06:07', '2025-03-08 00:48:41', '1730714857_sensors-20-06967.pdf', 1, ''),
(18, 2, 1, 'Test speaker1', 'test-speaker1', NULL, 'kjkjbhvhjkjjvgbnmk', '<div>kjkjbhvhjkjjvgbnmk</div>', NULL, '2024-11-07 19:10:46', '2025-03-06 08:39:23', NULL, 25, 'Soejatmoko'),
(19, 7, 1, 'Muhammadiyah Miliki 13 Universitas Terakreditasi Unggul', 'muhammadiyah-miliki-13-universitas-terakreditasi-unggul', 'post-images/Xt02KA66QcHWOxcj0MnI8Bi5GMsdD9XMhwCBBnDw.webp', 'MUHAMMADIYAH.OR.ID, SURABAYA – Perguruan Tinggi Muhammadiyah-’Aisyiyah (PTMA) kembali menambah jumlah universitasnya yang terakreditasi unggul. Sebelumnya sudah ada 12 PTMA Unggul, kini menjadi 13.Jum...', '<div><strong>MUHAMMADIYAH.OR.ID, SURABAYA –</strong> Perguruan Tinggi Muhammadiyah-’Aisyiyah (PTMA) kembali menambah jumlah universitasnya yang terakreditasi unggul. Sebelumnya sudah ada 12 PTMA Unggul, kini menjadi 13.<br><br></div><div>Jumlah tersebut bertambah setelah Universitas Muhammadiyah (UM) Surabaya meraih status akreditasi unggul. Akreditasi unggul berdasarkan SK BAN-PT Nomor 2132/SK/BAN-PT/Ak/PT/XI/2024 tertanggal 26 November 2024.<br><br></div>', NULL, '2024-11-27 05:26:41', '2025-01-14 03:10:18', '1732710401_Kajian20241104061313.pdf', 20, 'Bambang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_kajians`
--

CREATE TABLE `kategori_kajians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_kajians`
--

INSERT INTO `kategori_kajians` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Kajian Malam Selasa', 'kajian-malam-selasa', '2024-11-02 10:21:08', '2024-11-02 10:21:08'),
(2, 'Kajian Malam Jumat', 'kajian-malam-jumat', '2024-11-02 10:21:08', '2024-11-02 10:21:08'),
(3, 'Kajian Malam Kamis', 'kajian-malam-kamis', '2024-11-02 10:21:08', '2024-11-02 10:21:08'),
(4, 'Kajian Jumat Pon', 'kajian-Jumat-Pon', '2024-11-27 05:23:01', '2024-11-27 05:23:01'),
(5, 'Kajian Pimpinan', 'kajian-pimpinan', '2024-11-27 05:23:01', '2024-11-27 05:23:01'),
(6, 'Kajian Ibu Ibu Shakinah', 'kajian-Ibu-Ibu-Shakinah', '2024-11-27 05:23:01', '2024-11-27 05:23:01'),
(7, 'Kajian Masjid Al Amien', 'kajian-Masjid-Al-Amien', '2024-11-27 05:23:01', '2024-11-27 05:23:01'),
(8, 'Kajian Masjid Safinatullah', 'kajian-Masjid-Safinatullah', '2024-11-27 05:23:01', '2024-11-27 05:23:01'),
(9, 'Kajian Masjid Baiturohman', 'kajian-Masjid-Baiturohman', '2024-11-27 05:23:01', '2024-11-27 05:23:01'),
(10, 'Kajian Masjid Al Ikhsan', 'kajian-Masjid-Al-Ikhsan', '2024-11-27 05:23:01', '2024-11-27 05:23:01'),
(11, 'Kajian Masjid Al Khasanah', 'kajian-Masjid-Al-khasanah ', '2024-11-27 05:23:01', '2024-11-27 05:23:01'),
(12, 'Kajian Masjid Al Hikmah', 'kajian-Masjid-Al-Hikmah', '2024-11-27 05:23:01', '2024-11-27 05:23:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_strukturorganisasi`
--

CREATE TABLE `kategori_strukturorganisasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_strukturorganisasi`
--

INSERT INTO `kategori_strukturorganisasi` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Struktur Organisasi Muhammadiyah', 'Struktur-Organisasi-Muhammadiyah', '2024-11-27 08:20:49', '2024-11-27 08:20:49'),
(2, 'Struktur Organisasi Aisyiyah', 'Struktur-Organisasi-Aisyiyah', '2024-11-27 08:20:49', '2024-11-27 08:20:49'),
(3, 'Struktur Organisasi Masjid Al Amien', 'Struktur-Organisasi-Masjid-Al-Amien', '2024-11-27 08:20:49', '2024-11-27 08:20:49'),
(4, 'Struktur Organisasi Masjid Safinatullah', 'Struktur-Organisasi-Masjid-Safinatullah', '2024-11-27 08:20:49', '2024-11-27 08:20:49'),
(5, 'Struktur Organisasi Masjid Baiturohman', 'Struktur-Organisasi-Masjid-Baiturohman', '2024-11-27 08:20:49', '2024-11-27 08:20:49'),
(6, 'Struktur Organisasi Masjid Al Ikhsan', 'Struktur-Organisasi-Masjid-Al-Ikhsan', '2024-11-27 08:20:49', '2024-11-27 08:20:49'),
(7, 'Struktur Organisasi Masjid Al Khasanah', 'Struktur-Organisasi-Masjid-Al-Khasanah', '2024-11-27 08:20:49', '2024-11-27 08:20:49'),
(8, 'Struktur Organisasi Masjid Al Hikmah', 'Struktur-Organisasi-Masjid-Al-Hikmah', '2024-11-27 08:20:49', '2024-11-27 08:20:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_s_k_s`
--

CREATE TABLE `kategori_s_k_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_s_k_s`
--

INSERT INTO `kategori_s_k_s` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'SK Cabang Muhammadiyah', 'SK-Cabang-Muhammadiyah', '2024-11-26 07:07:44', '2024-11-26 07:07:44'),
(2, 'SK Anggota Bagian Muhammadiyah', 'SK-Anggota-Bagian-Muhammadiyah', '2024-11-26 07:07:44', '2024-11-26 07:07:44'),
(3, 'SK Cabang Aisyiyah', 'SK-Cabang-Aisyiyah', '2024-11-26 07:07:44', '2024-11-26 07:07:44'),
(4, 'SK-Anggota Majelis Aisyiyah', 'SK-Anggota-Majelis-Aisyiyah', '2024-11-26 07:07:44', '2024-11-26 07:07:44'),
(5, 'SK Ranting Masjid Al Amien', 'SK-Ranting-Masjid-Al-Amien', '2024-11-27 05:02:37', '2024-11-27 05:02:37'),
(6, 'SK Ranting Masjid Safinatullah', 'SK-Ranting-Masjid-Safinatullah', '2024-11-27 05:02:37', '2024-11-27 05:02:37'),
(7, 'SK Ranting Masjid Baiturohman', 'SK-Ranting-Masjid-Baiturohman', '2024-11-27 05:02:37', '2024-11-27 05:02:37'),
(8, 'SK Ranting Masjid Al Ikhsan', 'SK-Ranting-Masjid-Al-Ikhsan', '2024-11-27 05:02:37', '2024-11-27 05:02:37'),
(9, 'SK Ranting Masjid Al Khasanah', 'SK-Ranting-Masjid-Al-Khasanah', '2024-11-27 05:02:37', '2024-11-27 05:02:37'),
(10, 'SK Ranting Masjid Al Hikmah', 'SK-Ranting-Masjid-Al-Hikmah', '2024-11-27 05:02:37', '2024-11-27 05:02:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lingkups`
--

CREATE TABLE `lingkups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lingkups`
--

INSERT INTO `lingkups` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Muhammadiyah', 'muhammadiyah', '2024-12-03 12:51:39', '2024-12-03 12:51:39'),
(2, 'Aisyiyah', 'aisyiyah', '2024-12-03 12:51:39', '2024-12-03 12:51:39'),
(3, 'Angkatan Muda', 'angkatan-muda', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_19_083259_create_posts_table', 1),
(6, '2024_10_19_084245_create_categories_table', 1),
(7, '2024_10_25_090021_add_is__admin_to_users_table', 2),
(8, '2024_10_28_135722_add_role_to_users_table', 3),
(9, '2024_10_29_125852_create_role_requests_table', 4),
(10, '2024_11_02_141435_create_sejarah_table', 5),
(11, '2024_11_02_170609_create_kajian_table', 6),
(12, '2024_11_02_170801_create_kategori_kajian_table', 6),
(13, '2024_11_04_053339_add_dokumen_to_kajians_table', 7),
(14, '2024_11_07_084417_add_click_count_to_posts_table', 8),
(15, '2024_11_07_155649_add_click_count_to_kajians_table', 9),
(16, '2024_11_08_014600_add_speaker_to_kajians_table', 10),
(17, '2024_11_26_071527_create_kategori_sk_table', 11),
(18, '2024_11_26_071737_create_sk_table', 11),
(19, '2024_11_26_083256_add_year_to_sk_table', 12),
(20, '2024_11_26_135749_create_kategori_s_k_table', 13),
(21, '2024_11_26_135908_create_sk_table', 13),
(22, '2024_11_27_144229_create_kategori_strukturorganisasi_table', 14),
(23, '2024_11_27_144354_create_strukturorganisasi_table', 14),
(24, '2024_11_27_145202_add_kategori_to_strukturorganisasi_table', 15),
(25, '2024_11_28_090810_create_position_pimpinan_table', 16),
(26, '2024_11_28_091115_create_biodata_pimpinan_table', 16),
(27, '2024_12_03_075713_create_inventaris_table', 17),
(28, '2024_12_03_082100_add_lokasi_to_inventaris_table', 18),
(29, '2024_12_03_082411_create_location__inventaris_table', 19),
(30, '2024_12_03_193959_create_pelaksanaprogram_table', 20),
(31, '2024_12_03_194336_create_lingkup_table', 20),
(32, '2024_12_03_203743_create_musyawarah_table', 21),
(33, '2024_12_04_083317_create_prestasi_table', 22),
(34, '2024_12_11_144829_create_visitors_table', 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `musyawarahs`
--

CREATE TABLE `musyawarahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `lingkup_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `agenda` text DEFAULT NULL,
  `hasil` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `musyawarahs`
--

INSERT INTO `musyawarahs` (`id`, `title`, `slug`, `lingkup_id`, `image`, `time`, `location`, `agenda`, `hasil`, `created_at`, `updated_at`) VALUES
(1, 'musyawarah ranting', 'musyawarah-ranting', 1, NULL, '2024-12-04 04:16:00', 'sumpiuh', '<div>test semoga bisa</div>', '<div>bisa dunggg</div>', '2024-12-03 14:17:02', '2024-12-03 15:00:38'),
(4, 'Musyawarah ranting Aisyiyah', 'musyawarah-ranting-aisyiyah', 2, 'post-images/1733588645_bennie-bates-j7l_GR9WeZE-unsplash.jpg', '2024-12-04 23:23:00', 'bms', '<div>test dulu</div>', '<div>Berhasil</div>', '2024-12-07 09:24:05', '2024-12-07 09:24:05'),
(5, 'Musyawarah Angkatan Muda', 'musyawarah-angkatan-muda', 3, 'post-images/1733594835_bennie-bates-j7l_GR9WeZE-unsplash.jpg', '2024-12-02 01:06:00', 'bms', '<div>Testt</div>', '<div>Berhasil</div>', '2024-12-07 11:07:15', '2024-12-07 11:07:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelaksana_programs`
--

CREATE TABLE `pelaksana_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `lingkup_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelaksana_programs`
--

INSERT INTO `pelaksana_programs` (`id`, `title`, `slug`, `lingkup_id`, `image`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Pimpinan Harian', 'pimpinan-harian', 1, 'post-images/1733257608_bennie-bates-j7l_GR9WeZE-unsplash.jpg', 'baron', '<div><strong><br>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div>', '2024-12-03 13:06:26', '2024-12-10 08:06:19'),
(3, 'Bagian Tablig', 'bagian-tablig', 1, 'post-images/1733647749_Fakultas-Teknik-Unsoed.jpeg.webp', 'Salmon', '<div><strong><br>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div>', '2024-12-08 01:49:10', '2024-12-10 08:06:31'),
(5, 'Pimpinan Harian Aisyiyah', 'pimpinan-harian-aisyiyah', 2, 'post-images/1733647881_WhatsApp Image 2024-11-21 at 05.51.48_d7454135.jpg', 'Ahmad', '<div><strong><br>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div>', '2024-12-08 01:51:21', '2024-12-10 08:06:41'),
(6, 'Majelis Tabligh dan Ketarjihan', 'majelis-tabligh-dan-ketarjihan', 2, 'post-images/1733647924_WhatsApp Image 2024-11-21 at 05.51.48_60590d01.jpg', 'syarif', '<div><strong><br>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div>', '2024-12-08 01:52:04', '2024-12-10 08:06:51'),
(7, 'Bagian Kader dan Sumber Daya Insani', 'bagian-kader-dan-sumber-daya-insani', 1, 'post-images/1733843324_bennie-bates-j7l_GR9WeZE-unsplash.jpg', 'Salmon', '<div><strong><br>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div>', '2024-12-10 08:08:45', '2024-12-10 08:08:45'),
(8, 'Bagian Ekonomi, Bisnis dan Pariwisata', 'bagian-ekonomi-bisnis-dan-pariwisata', 1, 'post-images/1733843373_bennie-bates-j7l_GR9WeZE-unsplash.jpg', 'Salmon', '<div><strong><br>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div>', '2024-12-10 08:09:33', '2024-12-10 08:09:33'),
(9, 'Bagian Pustaka dan Informasi', 'bagian-pustaka-dan-informasi', 1, 'post-images/1733843414_bennie-bates-j7l_GR9WeZE-unsplash.jpg', 'Salmon', '<div><strong><br>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div>', '2024-12-10 08:10:14', '2024-12-10 08:10:14'),
(10, 'Bagian Pembinaan Kesejahteraan Sosial', 'bagian-pembinaan-kesejahteraan-sosial', 1, 'post-images/1733843454_bennie-bates-j7l_GR9WeZE-unsplash.jpg', 'Salmon', '<div><strong><br>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div>', '2024-12-10 08:10:45', '2024-12-10 08:10:54'),
(11, 'Bagian Pembinaan Kesehatan Umum', 'bagian-pembinaan-kesehatan-umum', 1, 'post-images/1733843518_bennie-bates-j7l_GR9WeZE-unsplash.jpg', 'Salmon', '<div><strong><br>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div>', '2024-12-10 08:11:58', '2024-12-10 08:11:58'),
(12, 'Bagian Pendayagunaan Wakaf', 'bagian-pendayagunaan-wakaf', 1, 'post-images/1733843553_bennie-bates-j7l_GR9WeZE-unsplash.jpg', 'Salmon', '<div><strong><br>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div>', '2024-12-10 08:12:33', '2024-12-10 08:12:33'),
(13, 'Majelis Pendidikan, Anak Usia Dini, Dasar dan Menengah', 'majelis-pendidikan-anak-usia-dini-dasar-dan-menengah', 2, 'post-images/1733843619_bennie-bates-j7l_GR9WeZE-unsplash.jpg', 'Salmon', '<div><strong><br>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div>', '2024-12-10 08:13:39', '2024-12-10 08:13:39'),
(14, 'Majelis Pembinaan Kader', 'majelis-pembinaan-kader', 2, 'post-images/1733843663_bennie-bates-j7l_GR9WeZE-unsplash.jpg', 'Salmon', '<div><strong><br>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div><div>Selama satu abad, Muhammadiyah dikenal luas sebagai organisasi sosial-keagamaan yang sukses bergerak di ranah pendidikan, kesehatan, filantropi, da<br><br></div>', '2024-12-10 08:14:23', '2024-12-10 08:14:23'),
(15, 'Majelis Kesehatan', 'majelis-kesehatan', 2, 'post-images/1733843703_bennie-bates-j7l_GR9WeZE-unsplash.jpg', 'Salmon', '<div><strong><br>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div><div><br><br></div>', '2024-12-10 08:15:03', '2024-12-10 08:15:03'),
(16, 'Majelis Kesejahteraan Sosial', 'majelis-kesejahteraan-sosial', 2, 'post-images/1733843745_bennie-bates-j7l_GR9WeZE-unsplash.jpg', 'Salmon', '<div><strong><br>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div><div><br><br></div>', '2024-12-10 08:15:45', '2024-12-13 08:06:46'),
(17, 'Majelis Ekonomi dan Ketenagakerjaan', 'majelis-ekonomi-dan-ketenagakerjaan', 2, 'post-images/1733843787_bennie-bates-j7l_GR9WeZE-unsplash.jpg', 'Salmon', '<div><strong><br>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div>', '2024-12-10 08:16:27', '2024-12-10 08:16:27'),
(18, 'Lembaga Budaya Seni & Olah Raga', 'lembaga-budaya-seni', 2, 'post-images/1733843834_bennie-bates-j7l_GR9WeZE-unsplash.jpg', 'Salmon', '<div><strong><br>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div>', '2024-12-10 08:17:14', '2024-12-10 08:17:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `excerpt` text NOT NULL,
  `body` text NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `click_count` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `image`, `excerpt`, `body`, `published_at`, `created_at`, `updated_at`, `click_count`) VALUES
(1, 2, 2, 'Dignissimos iusto nostrum aspernatur veritatis officia.', 'molestiae-ea-iste-error-beatae', NULL, 'Tempora explicabo et minus rerum laudantium dolor optio quae. Sunt nesciunt ut vel id. Commodi eveniet minus et. Delectus ducimus temporibus blanditiis nesciunt est.', '<p>Id voluptatem aliquid quod dolorem sint. Aspernatur sed voluptatum numquam nobis ut amet. Aut vel illo et et consectetur in est.</p><p>Fugiat est asperiores exercitationem aut sit consequatur consequatur. Sit sint corporis et doloremque dolores voluptas occaecati. Qui id qui maxime fugiat. Laborum tempora nostrum exercitationem rem qui voluptatem.</p><p>Occaecati et est quo enim voluptatem illum eius et. Maxime debitis iusto laboriosam saepe eum aut est. Dolorem ipsum repellat earum quam unde inventore deserunt. Adipisci natus autem eos ipsa.</p><p>Sapiente harum enim a nihil ullam possimus. Ut sapiente nam placeat aut labore. Tempora quo ut occaecati totam quae voluptatibus.</p><p>Id quam consequatur accusamus temporibus. Atque dignissimos explicabo asperiores labore est ex. Possimus necessitatibus numquam ut perspiciatis suscipit itaque. Molestiae tenetur culpa corporis ratione et aut voluptatibus dolor.</p><p>Laudantium recusandae quo quas harum modi aliquam facere. Possimus quidem iure debitis inventore aut aliquam. Eum necessitatibus labore nostrum.</p><p>Saepe eligendi impedit praesentium eos assumenda. Iusto aliquam voluptatum itaque eum maxime. Omnis vero dolorem et minus sit.</p><p>Iure perferendis et voluptates sunt repellendus. Architecto consequuntur qui quis deserunt sequi. Omnis odit aut eum alias. Quod veniam est id vitae libero.</p>', NULL, '2024-10-19 03:03:24', '2024-11-08 18:23:36', 39),
(2, 2, 2, 'Voluptatum molestias excepturi.', 'dolorem-repellendus-est-eaque-possimus-et-id-dolores-excepturi', NULL, 'Fugiat voluptas illo nisi porro. Deserunt quis et nihil et ut aut ea. Quia voluptatem possimus fugit eos. Quod voluptas soluta aut.', '<p>Officiis unde aliquam porro architecto nam quidem. Sunt nihil qui officiis quas dolorem ut ut. Blanditiis vitae non quos asperiores delectus adipisci. Porro aperiam nesciunt aperiam mollitia quam et iure quia.</p><p>Optio voluptatem est hic dolores. A id ea aut quo. Ipsa quis eius et enim.</p><p>Rem et ad sed dolor minima praesentium sit et. Reiciendis distinctio officia maxime in occaecati est. Velit assumenda maiores ipsa magnam repudiandae. Veniam qui consequatur ut ullam praesentium.</p><p>Dolores nisi doloremque ea. Ut impedit enim dolorum dolorum hic. Eligendi et doloremque tempora eaque ut.</p><p>Soluta quis tenetur facere ut. Omnis fuga distinctio illum in mollitia nihil nostrum. Vitae minima corrupti tempora repudiandae. Nihil repellendus et consequatur qui.</p><p>Nulla est ut est ex aut non dolores. Pariatur commodi voluptas id nam corrupti iste vel. Error non consequatur libero. Consectetur dignissimos perspiciatis et tempore aliquam.</p><p>Voluptatem sapiente qui maxime. Odit ut ducimus vitae fugiat. Neque voluptatum voluptas unde ut earum tenetur. Qui et ex exercitationem voluptatibus id ipsum.</p><p>Qui animi sunt rem quis vel sapiente. Eos non pariatur rerum dicta enim est nihil.</p>', NULL, '2024-10-19 03:03:24', '2024-11-22 08:29:59', 5),
(3, 1, 1, 'Soluta porro soluta one.', 'soluta-porro-soluta-one.', NULL, 'Error provident est qui doloremque. Id aut recusandae eum harum. Id harum est sit aliquam animi alias voluptatem.Explicabo est non labore eos et alias laboriosam. Accusamus necessitatibus unde consequ...', '<div>Error provident est qui doloremque. Id aut recusandae eum harum. Id harum est sit aliquam animi alias voluptatem.<br><br></div><div>Explicabo est non labore eos et alias laboriosam. Accusamus necessitatibus unde consequatur enim doloribus rem numquam. Voluptatem tempore molestias at delectus assumenda.<br><br></div><div>Porro dolorem fuga molestias et sapiente. Et pariatur et laudantium est eos minima.<br><br></div><div>Dolorem laudantium unde optio cumque. Voluptatem eaque qui et et eos odit aut. Magnam praesentium consequuntur voluptatem sed exercitationem aut. Ut eum doloribus ipsum dolorum totam et et.<br><br></div><div>Dolores ut quasi aut facere tenetur dolores ipsam. Doloremque beatae nemo quae eum et. Iure molestias rerum facere esse sapiente ad. Similique maxime suscipit optio aliquid sed.<br><br></div><div>Distinctio exercitationem et deserunt repudiandae impedit. Exercitationem voluptate doloremque omnis.<br><br></div><div>Et autem cumque eos velit. Accusantium amet perferendis enim modi. Corporis aliquam laboriosam consectetur ipsum.<br><br></div>', NULL, '2024-10-19 03:03:24', '2024-11-08 16:27:44', 27),
(4, 1, 3, 'Voluptas reiciendis repellat quia optio facilis odio aliquam in molestiae.', 'alias-blanditiis-recusandae-distinctio-omnis-maiores', NULL, 'Qui qui quaerat mollitia sit id. Architecto et architecto sed sit. Aut nostrum praesentium sequi voluptate maxime accusantium. Sed iusto hic repudiandae eius.', '<p>Ut saepe atque eos qui aut voluptatem. Impedit inventore ut porro ut.</p><p>Velit non sit voluptatem voluptatem quis ut doloremque. Dolore molestias qui fugit. Quasi similique exercitationem magni sunt est molestiae est.</p><p>Incidunt voluptate necessitatibus et dolorem non. Explicabo sunt tempore et quos dolor et veritatis consectetur. Modi quia magnam fugit culpa voluptas modi alias.</p><p>Cumque aliquam officia modi. In nam aperiam maxime alias aut perspiciatis officiis distinctio. Quae odit culpa autem molestias voluptas. Voluptatum modi odio et omnis molestiae beatae.</p><p>Alias labore et atque. Eum odio inventore repellendus a et tenetur. Facere ex possimus ex doloremque dolore et.</p><p>Qui nihil dicta quod consequatur incidunt in. Consequatur illum enim libero pariatur. Tempore maiores tenetur voluptatem qui sunt. Accusamus dolorem placeat eum similique perferendis eum nobis occaecati.</p>', NULL, '2024-10-19 03:03:24', '2024-10-19 03:03:24', 0),
(5, 1, 1, 'Repudiandae velit cum.', 'non-enim-sequi-quis', NULL, 'Facilis ut earum error molestiae soluta nobis. Facilis velit et et et nesciunt molestiae est. Non voluptates earum eum fugiat. Vel quis nobis nemo dicta ex consequatur. Et dolore maiores omnis dolor consectetur molestias doloremque.', '<p>Quis nesciunt dolorem fugiat non pariatur illo. Consequatur adipisci numquam quibusdam quisquam ipsam. Voluptatibus excepturi suscipit voluptas dolor optio molestiae.</p><p>Quis quo laborum dolor aperiam quaerat. Aliquid iure expedita dicta officia consequatur delectus. Dicta veniam sunt aspernatur est et.</p><p>Odit repudiandae labore ut beatae recusandae enim sed cumque. Temporibus iste dolorem pariatur voluptas sint. Error impedit rerum non consequatur cumque autem. Veritatis officiis est dolor aut nemo.</p><p>Eaque exercitationem autem aut qui. Saepe cupiditate ratione consequatur nobis.</p><p>Laudantium delectus at optio delectus non. Quidem illo impedit necessitatibus repellendus perferendis pariatur. Amet nulla dolor blanditiis quos aut. Cum velit exercitationem animi eum enim incidunt in enim. Quo dolor corrupti autem mollitia repellat et.</p>', NULL, '2024-10-19 03:03:24', '2024-10-19 03:03:24', 0),
(6, 1, 2, 'Aut blanditiis repellat.', 'sed-qui-nihil-saepe-culpa-sapiente-est-magni', NULL, 'Nam occaecati velit illo dolores ullam. Aut alias aperiam qui quia. Vero occaecati minima amet qui corporis magni eum alias.', '<p>Est optio et exercitationem non aut. Ratione et ex labore ad. Enim autem cumque itaque ex ratione. Quia reiciendis dignissimos a earum.</p><p>Rerum nisi quos quos dolores et odio. Aut praesentium quos voluptatem officia. Rerum vitae animi sunt et et est ducimus totam. Perspiciatis dicta nesciunt delectus sunt neque dignissimos eius saepe.</p><p>Et occaecati est dolore tenetur voluptas. Aut quod et illo quaerat minima dolorem reprehenderit. Quo et asperiores et exercitationem. Consequatur nobis corrupti ea et aut.</p><p>Doloremque quo accusamus distinctio cupiditate alias placeat non repellendus. Debitis quos culpa voluptatem officia soluta. Voluptatem autem qui fuga quam vel.</p><p>Doloremque eius nostrum cumque distinctio hic sit. Eaque minima quos repellendus vero dignissimos. In dolores debitis rem dignissimos minima.</p><p>Beatae dolor et et totam in in necessitatibus. Accusantium non omnis esse quas similique.</p><p>Ratione aliquam omnis quia numquam nobis. Quidem est quos incidunt qui perferendis sint. Quos voluptatem praesentium sequi voluptate fuga quibusdam. Cumque excepturi perferendis sunt.</p><p>Optio quibusdam et consequatur fuga sit dolores. Debitis quo iusto occaecati molestiae at sed. Quam maiores aliquam minima.</p>', NULL, '2024-10-19 03:03:24', '2024-10-19 03:03:24', 0),
(7, 2, 1, 'Et repudiandae et nesciunt.', 'qui-nemo-non-maxime-mollitia-sed', NULL, 'Et accusamus voluptatem odit porro aliquam. Consectetur quia culpa nemo eveniet error. Quia alias dolorem molestias nemo et.', '<p>Dolorem ipsa voluptates cum asperiores ea. Dolores quos maxime autem deleniti. Quaerat commodi est architecto architecto veritatis autem blanditiis fuga.</p><p>Qui sint in aliquid. Quod modi quisquam dolor voluptas quaerat.</p><p>Error ab quibusdam quam eum. Corrupti dicta sunt repellat minima qui necessitatibus. Corrupti accusantium dolorum nam nam.</p><p>Corrupti at quo quo et aut. Accusantium delectus cumque unde labore.</p><p>Ut sed voluptatem eaque et et ratione. Ex corporis ut libero et et sed et. Et non consequatur nostrum numquam rem. Sed aut optio consequatur qui odio quibusdam et sed.</p>', NULL, '2024-10-19 03:03:24', '2024-10-19 03:03:24', 0),
(8, 1, 2, 'Id magni in.', 'suscipit-amet-harum-earum-minus', NULL, 'Iusto voluptatibus iste consequatur aperiam. Sunt repellendus saepe mollitia vero. Laboriosam minus aspernatur dolor commodi consequuntur. Optio qui aperiam quod.', '<p>Ea explicabo provident eligendi. Excepturi voluptatem dolorum eos ducimus ut officia natus.</p><p>Nesciunt autem sunt tempora doloribus sunt. Magni asperiores dolor ut.</p><p>Sed perspiciatis blanditiis ipsam numquam iure vitae dolorum. Vel ullam dolore rerum alias sapiente. Harum alias beatae perferendis neque quis autem vel.</p><p>Ab dolore repellendus eius et in quia itaque fugiat. Voluptate aut veritatis magni cupiditate. Soluta molestiae eum in qui mollitia in at.</p><p>Alias rerum tempora facere voluptas. Quia sit fugit aut qui placeat. Distinctio voluptatem reiciendis eos aperiam quo omnis minima eum. Deserunt laboriosam porro sapiente consequuntur eius facere veniam. At iusto animi deserunt ipsam quia nulla est.</p>', NULL, '2024-10-19 03:03:24', '2024-10-19 03:03:24', 0),
(9, 2, 3, 'Eos eligendi et.', 'distinctio-beatae-accusantium-non', NULL, 'Voluptatem doloremque et enim tempore est possimus dolore. Fuga assumenda sunt quis veritatis qui. Cumque pariatur velit qui labore. Eligendi officiis non iure qui officiis.', '<p>Quo sunt vitae dicta nobis. Beatae sunt nostrum ipsum et. Beatae facere a molestias quos qui qui aliquid ea. Consequuntur cupiditate assumenda voluptate provident dignissimos ullam perferendis.</p><p>Soluta incidunt fugiat rerum labore. Non asperiores nisi sapiente a et. Rerum et aut dolor vero voluptatem. Non illum ipsa praesentium vel nemo dicta voluptates. Quidem vel incidunt ducimus perferendis ab.</p><p>Et in maiores sequi cumque ea eveniet distinctio. Repellendus molestiae voluptates aut. Repellat laudantium expedita error veritatis commodi assumenda. Eum consectetur voluptatibus nostrum.</p><p>Consequuntur magnam libero totam aspernatur magnam. Suscipit tempora minus sit ratione. Qui animi fugiat similique et. Quia ut dolorem nesciunt.</p><p>Aut dolorem quia alias est qui. Culpa fugit rerum consequuntur asperiores itaque odit. Corrupti delectus ut autem voluptas. Consequatur illum natus ipsa repudiandae.</p><p>Aut excepturi autem atque commodi consectetur aliquid. Laudantium dicta minima quo ut quidem ipsum officiis. Eius quibusdam ullam nihil consequatur ut dolor sunt.</p><p>Eum nobis et accusantium atque qui. Consectetur sit possimus praesentium sunt ipsum molestiae magnam. Ut laudantium voluptatem dicta. Officia qui animi pariatur unde voluptatem.</p><p>Autem odio dolorem nostrum. Consequatur omnis velit laborum adipisci. Tenetur nisi omnis et aut optio deleniti. Necessitatibus dolores enim et expedita doloremque recusandae vitae.</p>', NULL, '2024-10-19 03:03:24', '2024-10-19 03:03:24', 0),
(10, 2, 3, 'Eos non laboriosam fuga.', 'sint-ab-quibusdam-enim-iure-ipsa', NULL, 'Molestiae architecto eligendi magni eius illo nostrum. Atque quaerat non deleniti placeat magni. Est nihil cumque qui cumque explicabo quisquam.', '<p>Sed at aut numquam quod unde. Blanditiis ut voluptatum officia ut.</p><p>Soluta sint dignissimos repellendus rem dicta itaque mollitia est. Eum velit fuga voluptates non sunt aut alias. Qui corporis ut ad doloribus.</p><p>Magnam sequi vero quia ea distinctio recusandae. Sit sint reiciendis omnis libero iste aut. Magnam aut sed voluptatem deserunt aut. Consequatur dolor iure et nisi eum nam ducimus.</p><p>Est alias molestiae soluta earum molestiae illum repellat. Consequatur qui reiciendis laborum iure. Omnis a quaerat voluptatibus doloremque culpa assumenda.</p><p>Repellendus rerum soluta eligendi eaque quisquam. Nobis ut esse sed autem eius sit perferendis. Et dolorum ducimus doloremque repellendus deleniti.</p><p>Error quis quia ab molestias veritatis et ut. Facere eaque omnis harum veritatis unde. Vel cupiditate ab voluptatum enim cumque. Similique enim voluptate quis nihil assumenda quis.</p><p>Culpa officia quaerat dolores voluptatem beatae alias voluptatibus. Et aut enim architecto distinctio unde dolorum atque.</p><p>Dolores voluptate debitis ab dolores facilis est. Ab illo voluptatum alias commodi qui qui sapiente. Aliquam dolor aspernatur voluptas nobis aut cupiditate. Rerum possimus consequatur atque cupiditate illo possimus.</p><p>Ipsum corrupti qui sed rerum. Est tempore fuga fugiat molestias sit odio.</p><p>Iste odit temporibus necessitatibus. Magni dolorum quas accusantium culpa rerum minus quidem. Doloribus autem ducimus sequi iure earum eos quia. Rerum excepturi ad sint aut qui consectetur.</p>', NULL, '2024-10-19 03:03:24', '2024-10-19 03:03:24', 0),
(11, 1, 3, 'Asperiores et eos praesentium.', 'consequatur-maxime-suscipit-consectetur-rerum-nisi-accusamus', NULL, 'Incidunt aperiam reiciendis molestiae. Exercitationem omnis velit fugiat eaque iusto ea voluptate ut. Quis vero ex placeat molestias ex sequi beatae.', '<p>Modi et molestias repudiandae consequatur recusandae corrupti voluptatem. Praesentium voluptas facere molestiae perferendis. Eos saepe placeat inventore sequi ipsum consequatur quibusdam praesentium.</p><p>Aliquid consectetur ut quo distinctio ex ut praesentium. Suscipit est inventore minima dicta mollitia fugiat. Et quis minima beatae ea quaerat aut.</p><p>Id repellat officiis ullam. Itaque ratione ut doloremque numquam velit qui. Eum accusamus omnis harum reprehenderit et.</p><p>Ea recusandae et nemo dolores. Aliquid quia nemo recusandae dignissimos aperiam omnis ea alias. Qui quia fugiat cum ut.</p><p>Qui totam corrupti in dignissimos. Quod amet dolorum suscipit qui a harum. Quasi vel quis commodi repellendus vero eligendi non. Delectus quas explicabo eum hic. Accusamus quo asperiores eius quidem autem repellendus.</p><p>Modi non numquam soluta voluptatem ipsa fuga architecto. Sunt consequuntur magni quidem commodi voluptatem vitae est. Et quibusdam perspiciatis temporibus. Harum et soluta odio cum neque.</p>', NULL, '2024-10-19 03:03:24', '2024-10-19 03:03:24', 0),
(12, 2, 3, 'Libero ex nam dignissimos.', 'omnis-sed-sed-voluptatem-laudantium-sed-unde-molestias-id', NULL, 'Ullam totam cupiditate at nihil sit. Fuga nemo magnam praesentium tempore qui vel consequuntur.', '<p>Ea molestiae voluptatem est hic. Nihil labore voluptatem reprehenderit ut quos est modi. Reprehenderit ut exercitationem sunt aspernatur aut sunt. Itaque mollitia minus nesciunt.</p><p>Unde dolores totam possimus dolores deleniti numquam non. Quo eius id fugit. Debitis beatae blanditiis dolorem. Aut est voluptatum voluptates sapiente distinctio maxime et.</p><p>Dolorem reiciendis est reprehenderit. Nam itaque sed quam sit soluta. Beatae corrupti et autem doloribus.</p><p>Neque dolores et iste quam qui illo. Eius fugit eligendi consectetur itaque quos quasi ab.</p><p>Maxime omnis cupiditate quas error voluptatem est. Rerum sunt voluptatem pariatur commodi quia. Voluptatem itaque dolorum sunt expedita molestiae. Sapiente adipisci dolores suscipit.</p>', NULL, '2024-10-19 03:03:24', '2024-10-19 03:03:24', 0),
(13, 2, 3, 'At dolorem nostrum dolores sunt nihil veritatis.', 'suscipit-ipsum-qui-minus', NULL, 'Et velit non occaecati sit mollitia dolore. Natus aut provident voluptatem in eos. Repellat magnam aliquid rerum et repellat. Ut enim et molestiae.', '<p>Alias consequatur recusandae et. Dolores quis aperiam delectus voluptas. Sint cumque ad neque ducimus sint id. Sapiente maxime ut magnam dolores debitis.</p><p>Est magnam expedita nisi repellendus ad magni. Animi necessitatibus vel nobis aliquam adipisci quidem sint aut. Quidem quidem aut aut et.</p><p>Blanditiis accusantium laborum at eos optio rem. Cumque culpa eaque et ullam qui. Ab iure asperiores sed rerum. Et reprehenderit facere doloremque magnam est.</p><p>Omnis vitae voluptate inventore corporis et nemo. Mollitia dolor accusantium similique at aut vel.</p><p>Iusto consequatur ut iure beatae. Nemo doloremque harum neque. Consequatur qui pariatur repellendus et quisquam laboriosam repellat. Fuga saepe consequatur fuga occaecati ducimus dicta.</p><p>Fugiat natus officia ut repudiandae. Aut omnis reprehenderit voluptate voluptatem recusandae id eum et. Ipsa consequuntur voluptatem odio saepe ab ad non ut. Saepe quasi voluptatem id accusantium tenetur id occaecati.</p><p>Laborum ad voluptas enim eius aut fuga ut minus. Odio minima animi nobis neque assumenda et. Enim voluptas possimus esse eos aliquam.</p><p>Aliquid ab necessitatibus ut nobis dolor. Veniam accusantium sed officia. Sunt dolore nesciunt inventore eum voluptatum et.</p>', NULL, '2024-10-19 03:03:24', '2024-10-19 03:03:24', 0),
(14, 2, 1, 'Sunt magni.', 'non-voluptas-odit-dolores', NULL, 'Et laborum iure enim doloremque aut porro maxime voluptas. Id vero cumque totam provident ut. Quasi nihil natus nemo voluptatem in.', '<p>Consequatur et aut itaque totam cum. Id ipsa et dolorum nesciunt consequuntur distinctio culpa. Sit deleniti consequatur id quia autem eius aut et. Velit dicta dolorem ea sit aut impedit rerum.</p><p>Assumenda quasi sunt iste vel corrupti alias qui. Et repudiandae non esse consequatur est. Ut quos eos porro labore ab.</p><p>Quia autem eligendi possimus ipsam aliquam modi error quaerat. Mollitia ut rerum maxime est ratione. Incidunt sed ratione suscipit quia quis rerum. Ullam ipsam ullam delectus est delectus vel.</p><p>Exercitationem aut ab neque provident facilis et. Consequuntur quibusdam excepturi consequatur aliquam.</p><p>Sed nostrum at voluptatem voluptatem necessitatibus odio in. Ut repudiandae adipisci cupiditate est perferendis. Accusantium dicta sint ut. Unde beatae natus explicabo consequatur.</p><p>Ex suscipit sint cumque consequatur. Minus quidem corrupti saepe nostrum cumque repudiandae deserunt voluptate. Tenetur dolor omnis commodi eligendi.</p><p>Atque ea et et rerum dolorum vero voluptatem similique. Consequuntur eaque sed sunt mollitia dolorem debitis sit. Quae ex ipsa eaque inventore repellendus et.</p>', NULL, '2024-10-19 03:03:24', '2024-10-19 03:03:24', 0),
(15, 2, 3, 'Accusantium maxime omnis veniam cupiditate.', 'omnis-est-ab-qui-natus-in-reiciendis', NULL, 'Et est commodi sapiente sint dicta optio. Tenetur provident qui adipisci ipsa ab. Et ullam consequatur enim ullam nulla nesciunt tempora.', '<p>Nulla non natus eius ea explicabo iure ut. Laborum sint non similique. Qui culpa ex sunt nesciunt eum. Magni soluta voluptas rerum saepe quis.</p><p>Alias illo quia ducimus. Tempore labore quis eius incidunt nobis. Perferendis praesentium vero qui provident.</p><p>Dolorum sunt cupiditate perferendis et. Magnam dicta dolores repellat quisquam. Dicta facilis officiis ea quam. Distinctio consequatur dolor illo dolore eum.</p><p>Cumque molestiae modi modi nostrum itaque quis. Qui fugit quia qui et. Sed rerum corrupti dolorum eos voluptas error.</p><p>Sunt odio exercitationem reiciendis et animi. Occaecati laudantium eum aliquam ratione. Ut quibusdam omnis provident dolores et impedit quo. Maiores omnis nobis enim sed suscipit. Sint quia qui maxime quis.</p><p>Quos voluptas labore doloremque sint quis velit velit. Iste quam excepturi perspiciatis. Consequatur sit blanditiis ut et facere accusamus.</p><p>Maiores voluptatem recusandae officia. Veritatis et incidunt molestiae. Sint voluptatibus porro laboriosam eaque sint necessitatibus. Rerum qui voluptatem voluptatem iusto id accusantium omnis quas.</p><p>Numquam in distinctio optio officiis eum et. Nobis nulla enim fugit tempora ut ad. Voluptas libero quasi beatae praesentium totam illo ut. Assumenda aspernatur laudantium aut autem.</p><p>Odit reiciendis inventore aut voluptatibus. Velit voluptatem inventore minima aperiam architecto. Unde architecto dolore et doloribus ad et aut.</p><p>Eveniet sed ducimus iusto. Autem animi quod et vel laboriosam ipsum. Exercitationem quae rem omnis modi nesciunt harum.</p>', NULL, '2024-10-19 03:03:24', '2024-10-19 03:03:24', 0),
(16, 2, 2, 'Quia est ex eos nihil sint maxime.', 'impedit-aut-et-consequatur', NULL, 'Est doloremque autem et reiciendis nobis labore. Sequi molestias facilis harum ex nihil in eos. Laboriosam dolor sapiente quia sunt tempore incidunt quisquam. Cupiditate ea voluptatem voluptatem autem quibusdam nostrum. Illum perferendis est esse deleniti qui aut.', '<p>Et reiciendis ut autem animi. Quidem sunt at est eum qui sed in. Rerum quis aspernatur eveniet praesentium dolores. Est eaque et ipsam.</p><p>Et expedita deleniti numquam ullam sed vel. Quia qui magni in ea. Ut autem qui aspernatur rerum nihil dolorem. Optio tempore enim praesentium ratione eos tempore. Quod accusantium porro qui et et aut consequatur esse.</p><p>Tenetur ipsa enim nihil aut autem quo. Reiciendis delectus natus ea et. Magnam dolor velit vel aliquam voluptatum dicta qui.</p><p>Et voluptas ut animi rerum quia quas. Quaerat enim consequatur laboriosam ullam. Ex voluptatum eius at delectus quia error possimus.</p><p>Voluptatum asperiores voluptate odit ut rerum totam. Fugit perferendis debitis deserunt sit a eum. Accusantium quod a magni asperiores est aliquam quidem.</p><p>Dolorum qui iste sit dicta voluptatem deleniti. Omnis voluptas distinctio ea molestias. Ut sunt dolores minima vitae et adipisci.</p><p>Ipsam blanditiis eius voluptatibus molestiae ratione possimus consequatur minus. Tempore dolore placeat eos perferendis aperiam ut. Maiores fugiat eos officia praesentium.</p><p>Ut quisquam vitae distinctio et. Eligendi ex labore aut impedit perferendis est explicabo.</p><p>Eum quisquam quae facere non et quo in laudantium. Officia et suscipit animi nulla rerum. Corporis aut iusto quibusdam similique. Quo et unde iure ad quam assumenda aperiam.</p><p>Officiis deleniti odio cumque aut officiis ab iste quod. Et magni assumenda velit amet quas omnis ut. Reprehenderit ducimus est quaerat sit est sed autem. Sit cupiditate nihil iusto illo vero.</p>', NULL, '2024-10-19 03:03:24', '2024-10-19 03:03:24', 0),
(17, 1, 2, 'Voluptate dolorum iure et maiores placeat non nemo qui impedit.', 'eum-natus-dolorum-iste-enim', NULL, 'Nihil quidem autem non amet ut architecto odit. Id dolore voluptas sunt nostrum dolores odit vero. Tempora aut nemo minima possimus. Repellat maxime odit harum est.', '<p>Culpa dolores minus est aspernatur dolorem. Voluptas molestias eaque facilis voluptatem quibusdam aut minima. Quaerat consequuntur quod blanditiis fuga ut temporibus ratione quod. Voluptas recusandae consequatur possimus occaecati.</p><p>Laboriosam debitis sint quia dolorum eos cum quas. Culpa necessitatibus deserunt exercitationem. Aut maxime ullam blanditiis aut nesciunt corporis vero neque.</p><p>Quam aut voluptas laborum accusantium eaque laborum. Odit consequatur autem autem est. Rem numquam accusamus quis quasi reprehenderit quam architecto. Adipisci autem et error qui et.</p><p>Quo asperiores aut voluptatem dolorem error. Suscipit a rerum accusamus necessitatibus nemo enim quisquam voluptatum. Reprehenderit fugit reiciendis molestiae earum nihil. Reiciendis vel molestiae voluptate. Hic maiores consectetur at blanditiis ut consequatur exercitationem ut.</p><p>Velit sed animi mollitia ducimus provident. Dignissimos voluptatem non nobis blanditiis sint omnis non. Ea impedit fugiat nulla qui ut.</p>', NULL, '2024-10-19 03:03:24', '2024-10-19 03:03:24', 0),
(18, 1, 1, 'Consequatur officia et quisquam omnis excepturi voluptatem autem.', 'dolores-nulla-ut-omnis', NULL, 'Quia eum quidem asperiores ab. Et corrupti voluptatum ut ut quae consequuntur. Accusantium esse modi animi eum consectetur.', '<p>Consequatur dicta ab est sed possimus voluptas. Nisi dolor quam blanditiis tempora. Sint illum velit asperiores nisi maiores.</p><p>Unde quasi consequatur in qui molestiae distinctio. Necessitatibus odit similique explicabo vel delectus at. Voluptas debitis accusamus et distinctio delectus.</p><p>Incidunt mollitia architecto doloremque architecto suscipit corrupti occaecati. Facilis mollitia cupiditate quia laudantium cumque qui odio. Qui repellendus et quia assumenda. Vero ullam accusantium facere voluptatibus occaecati consequatur accusamus.</p><p>Occaecati sapiente quae dignissimos deleniti molestiae. Repellendus adipisci corporis reiciendis. Aut maxime a accusantium ullam aliquam expedita velit. Vitae eum doloremque pariatur placeat velit consequatur.</p><p>Assumenda enim ea eum. Dicta omnis dolorum velit numquam. Sed vero a modi perferendis ipsam error.</p><p>Repellat et eveniet animi praesentium vel ratione rerum. Alias pariatur consequatur voluptate natus rerum rerum ea. Aperiam velit qui id maxime facere. Maxime dolores ipsam reprehenderit molestias incidunt libero cum.</p>', NULL, '2024-10-19 03:03:24', '2024-10-19 03:03:24', 0),
(19, 1, 3, 'A recusandae enim blanditiis animi aspernatur enim neque rerum.', 'minima-doloremque-suscipit-modi-voluptates-quia-perferendis-fugiat', NULL, 'Aut explicabo reprehenderit harum voluptatem neque et eum eos. Deleniti assumenda magnam vero voluptatum modi vero quo. Quas et soluta maiores rerum temporibus. Quia harum eum sit necessitatibus voluptatem.', '<p>Quaerat natus soluta ut ipsum iure. Voluptates perferendis vitae numquam tenetur nemo officia. Asperiores sed et dignissimos molestiae.</p><p>Rem labore dolor saepe voluptas ratione voluptatum. Nihil aperiam veritatis vel officia sint quas. Sed qui voluptatum earum.</p><p>Vel tempora qui enim ab voluptates numquam sint. Magnam quas vel in et magnam ut. Dicta animi reprehenderit est a. Aliquid officiis corrupti non ducimus voluptatem eveniet aspernatur sit.</p><p>Quia optio iusto maxime totam voluptate aut voluptates. Autem qui sed molestias rerum sapiente. Ducimus quia nisi occaecati nobis eius qui. Perferendis tempora porro amet neque. Deserunt provident quasi tenetur nobis libero neque.</p><p>Accusantium sed debitis deserunt aliquid qui quis. Omnis consequuntur vitae tempora ducimus illum. Laborum blanditiis voluptatem velit quia sunt quos in doloribus. Deleniti reprehenderit dignissimos molestiae quae velit laudantium impedit.</p><p>Sit soluta fugit veritatis debitis velit fuga libero. Reiciendis quam autem magnam quo velit libero. Omnis quo ex facilis sed ratione aspernatur. Eveniet nostrum quia eos.</p>', NULL, '2024-10-19 03:03:24', '2024-10-19 03:03:24', 0),
(20, 2, 2, 'Quos ab ut ut ut deserunt.', 'fuga-ut-et-accusantium', NULL, 'Enim blanditiis sunt quae omnis animi occaecati dolores. Similique laudantium et veniam cupiditate amet delectus asperiores et. Voluptatem omnis quis vero natus.', '<p>Voluptas velit ipsa aspernatur et. Odit voluptatum consectetur asperiores odio. Aspernatur sed ipsam voluptas minus. Ut explicabo recusandae modi architecto.</p><p>Ut explicabo eum illum velit et consectetur. Dolorem dolorem optio dicta est quam natus. Voluptatem rem dolorem laborum ullam.</p><p>Sed unde quidem architecto qui facere cum architecto aliquam. Aperiam eaque harum autem in et quia dolorum. Iste et ex consequatur quia.</p><p>Enim sint necessitatibus earum velit est et et. Et accusantium beatae dolor est. Et molestias quod cum reiciendis impedit.</p><p>Quo qui rerum inventore ipsum laboriosam voluptatum. Et corporis quis est eveniet. Magnam eveniet culpa optio exercitationem et repellat illo.</p><p>Aut quos sunt labore. Ex reprehenderit odit atque cupiditate. Quasi qui et et.</p><p>Minima itaque porro rem nihil labore. Sapiente qui ab et dolore. Aliquam non sapiente ut doloribus voluptate aut ut ex.</p><p>Harum ullam laborum sunt maiores velit. Quia ut explicabo qui quia. Commodi id perspiciatis consequatur quae rerum maiores.</p>', NULL, '2024-10-19 03:03:24', '2024-10-19 03:03:24', 0),
(22, 1, 1, 'coba lagi', 'coba-lagi', 'post-images/Idb0Ku4J7NbSyyRBmDag2kh89Q2VI7CCVP5Qz5sw.png', 'pengen cepet lulus', '<div>pengen cepet lulus</div>', NULL, '2024-10-25 08:30:16', '2024-11-08 20:46:21', 4),
(26, 1, 1, 'coba', 'coba', 'post-images/ew1mEk5dqn1BTTciWmusWe0aKuX3tixaOrDy1JLy.png', 'vbjokpjhvhbjknm,&nbsp;', '<div>vbjokpjhvhbjknm,&nbsp;</div>', NULL, '2024-10-28 00:14:46', '2024-11-07 07:27:58', 3),
(27, 11, 1, 'Ketua MUI Puji Keberadaan Kampus Muhammadiyah di Malaysia', 'ketua-mui-puji-keberadaan-kampus-muhammadiyah-di-malaysia', 'post-images/FnCUa6VRrt2jhRjbAd5yCgZA4DLZ3MOtaYeN2UqM.jpg', 'MUHAMMADIYAH.OR.ID, PERLIS – Majelis Ulama Indonesia (MUI) yang dipimpin oleh Sekretaris Jenderal MUI, Amirsyah Tambunan, bersama Ketua MUI, K.H. Cholil Nafis, Sudarnoto Abdul Hakim,&nbsp; Trisna Juwa...', '<div><strong>MUHAMMADIYAH.OR.ID, PERLIS –</strong> Majelis Ulama Indonesia (MUI) yang dipimpin oleh Sekretaris Jenderal MUI, Amirsyah Tambunan, bersama Ketua MUI, K.H. Cholil Nafis, Sudarnoto Abdul Hakim,&nbsp; Trisna Juwaili, Erni Juliana Al Hasanah, Bunyan Saptomo dan sejumlah anggota lainnya mengadakan kunjungan ke University Muhammadiyah Malaysia (UMAM) pada Sabtu (9/11).<br><br></div><div>Kunjungan ini menjadi sangat bersejarah, mengingat UMAM adalah kampus pertama Muhammadiyah yang didirikan di luar Indonesia dan menjadi kebanggaan tersendiri bagi masyarakat Indonesia.<br><br></div><div>K.H. Cholil Nafis,&nbsp; Ketua MUI menyampaikan, pendirian UMAM di Malaysia menjadi simbol eratnya hubungan antara Indonesia dan Malaysia, khususnya dalam hal pendidikan dan dakwah Islam.<br><br></div><div>Dia berharap kolaborasi antara MUI dan UMAM dapat terus dikembangkan, khususnya dalam bidang kajian Islam dan pendidikan, untuk menjawab tantangan global yang dihadapi umat Muslim saat ini.<br><br></div>', NULL, '2024-11-10 08:54:37', '2025-01-16 07:34:40', 16),
(28, 11, 1, 'Pengumuman Calon Penerima Beasiswa S1 di Libya', 'pengumuman-calon-penerima-beasiswa-s1-di-libya', 'post-images/pMKDQhQR3MKhZ7hbosLUkGmC4Ze2dsr2mQTA1gq1.png', 'MUHAMMADIYAH.OR.ID, JAKARTA – Pimpinan Pusat Muhammadiyah mengucapkan selamat dan sukses kepada 20 peserta yang terpilih sebagai calon penerima Beasiswa S1 untuk studi di Libya. Keputusan ini merupaka...', '<div><strong>MUHAMMADIYAH.OR.ID, JAKARTA –</strong> Pimpinan Pusat Muhammadiyah mengucapkan selamat dan sukses kepada 20 peserta yang terpilih sebagai calon penerima Beasiswa S1 untuk studi di Libya. Keputusan ini merupakan bagian dari komitmen Muhammadiyah untuk terus mendukung peningkatan kualitas pendidikan di Indonesia dan menghasilkan generasi penerus yang unggul.<br><br></div><div>Ketua Pimpinan Pusat Muhammadiyah, Syafiq A. Mughni, menyampaikan ucapan selamat dan harapan agar para calon penerima beasiswa dapat memanfaatkan kesempatan ini untuk mengembangkan ilmu pengetahuan dan keterampilan yang bermanfaat bagi masyarakat, agama, negara, dan bangsa.<br><br></div><div>“Selamat kepada ananda yang terpilih menjadi calon penerima Beasiswa S1 Libya. Ini adalah kesempatan emas untuk mengembangkan diri, mendapatkan pengalaman internasional, dan kembali ke tanah air sebagai pribadi yang lebih berkualitas. Muhammadiyah selalu mendukung langkah-langkah pendidikan yang dapat memberikan manfaat bagi umat dan bangsa,” ujar Syafiq pada Sabtu (9/11).<br><br></div><div>Selain itu, Ketua Tim Beasiswa Luar Negeri Pimpinan Pusat Muhammadiyah, Maskuri, juga menyampaikan ucapan selamat yang tulus kepada para calon penerima beasiswa tersebut. Menurutnya, beasiswa ini bukan hanya sekedar bantuan pendidikan, melainkan merupakan amanah besar yang harus dijaga dengan penuh tanggung jawab sebagai kader Muhammadiyah.<br><br></div>', NULL, '2024-11-10 08:56:01', '2024-11-10 08:56:01', 0),
(29, 11, 1, 'Judi Online Dipromosikan Deretan Artis Terkenal, Begini Tanggapan Ketua PP Muhammadiyah', 'judi-online-dipromosikan-deretan-artis-terkenal-begini-tanggapan-ketua-pp-muhammadiyah', 'post-images/J67fenWHD2VHFSWfsVlZmzsE2RSZPphD807DpYiH.jpg', 'MUHAMMADIYAH.OR.ID, MAKKAH—Maraknya promosi judi online yang melibatkan sejumlah artis dan influencer mendapat tanggapan serius dari Ketua Pimpinan Pusat (PP) Muhammadiyah, Dadang Kahmad. Dalam wawanc...', '<div>MUHAMMADIYAH.OR.ID, MAKKAH—Maraknya promosi judi online yang melibatkan sejumlah artis dan influencer mendapat tanggapan serius dari Ketua Pimpinan Pusat (PP) Muhammadiyah, Dadang Kahmad. Dalam wawancara melalui pesan daring pada Jumat (8/11), Dadang menyatakan bahwa judi online semakin merajalela karena kurangnya penindakan tegas.<br><br></div><div>“Judol (judi online) semakin terang-terangan karena kalau kejahatan dan keburukan dibiarkan, tidak ada penindakan baik dari pemerintah maupun non-pemerintah, akan seperti itu, promosi judi online makin merajalela. Apalagi banyak orang yang berkuasa ikut bermain dalam promosi judol,” kata Dadang.<br><br></div><div>Dadang juga menyoroti adanya ketidakadilan dalam penegakan hukum terkait judi online. Menurutnya, perlakuan yang berbeda terhadap masyarakat biasa dan artis besar mencerminkan lemahnya efektivitas hukum.<br><br></div><div>“Ya, selama perlakuan diskriminasi seperti itu terjadi, penegakan hukum tidak akan efektif. Makanya judol makin meluas. Muhammadiyah menyayangkan dan mengecam perlakuan hukum diskriminatif terhadap pelaku promosi judol,” ungkapnya.<br><br></div>', NULL, '2024-11-10 08:57:30', '2025-01-14 06:28:35', 5),
(31, 15, 1, 'Prestasi Baru TK ABA', 'prestasi-baru-tk-aba', 'post-images/qaSthAFGlcRyGsNbPd3uw1SWoq8XmPKi3qwIKkGW.jpg', 'MUHAMMADIYAH.OR.ID, JAKARTA – Pimpinan Pusat Muhammadiyah mengucapkan selamat dan sukses kepada 20 peserta yang terpilih sebagai calon penerima Beasiswa S1 untuk studi di Libya. Keputusan ini merupaka...', '<div><strong>MUHAMMADIYAH.OR.ID, JAKARTA –</strong> Pimpinan Pusat Muhammadiyah mengucapkan selamat dan sukses kepada 20 peserta yang terpilih sebagai calon penerima Beasiswa S1 untuk studi di Libya. Keputusan ini merupakan bagian dari komitmen Muhammadiyah untuk terus mendukung peningkatan kualitas pendidikan di Indonesia dan menghasilkan generasi penerus yang unggul.<br><br></div>', NULL, '2024-12-12 20:03:48', '2024-12-12 20:03:48', 0),
(32, 13, 1, 'Bakti Sosial Idul Adha 1446 H', 'bakti-sosial-idul-adha-1446-h', 'post-images/pa87r3DWuoi0fI25ZZBmEBRXqjFwTwSkVNiJMKdA.jpg', 'MUHAMMADIYAH.OR.ID, JAKARTA – Pimpinan Pusat Muhammadiyah mengucapkan selamat dan sukses kepada 20 peserta yang terpilih sebagai calon penerima Beasiswa S1 untuk studi di Libya. Keputusan ini merupaka...', '<div><strong>MUHAMMADIYAH.OR.ID, JAKARTA –</strong> Pimpinan Pusat Muhammadiyah mengucapkan selamat dan sukses kepada 20 peserta yang terpilih sebagai calon penerima Beasiswa S1 untuk studi di Libya. Keputusan ini merupakan bagian dari komitmen Muhammadiyah untuk terus mendukung peningkatan kualitas pendidikan di Indonesia dan menghasilkan generasi penerus yang unggul.</div>', NULL, '2024-12-12 20:20:24', '2024-12-12 20:20:24', 0),
(33, 14, 1, 'Syiar Lomba Takbir 1446', 'syiar-lomba-takbir-1446', 'post-images/BI5GViqp7uzWdnfPp6yNqsTVCwvARjecM6zXVDQj.jpg', 'MUHAMMADIYAH.OR.ID, JAKARTA – Pimpinan Pusat Muhammadiyah mengucapkan selamat dan sukses kepada 20 peserta yang terpilih sebagai calon penerima Beasiswa S1 untuk studi di Libya. Keputusan ini merupaka...', '<div><strong>MUHAMMADIYAH.OR.ID, JAKARTA –</strong> Pimpinan Pusat Muhammadiyah mengucapkan selamat dan sukses kepada 20 peserta yang terpilih sebagai calon penerima Beasiswa S1 untuk studi di Libya. Keputusan ini merupakan bagian dari komitmen Muhammadiyah untuk terus mendukung peningkatan kualitas pendidikan di Indonesia dan menghasilkan generasi penerus yang unggul.</div>', NULL, '2024-12-12 20:21:01', '2024-12-12 20:21:01', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_requests`
--

CREATE TABLE `role_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `requested_role` varchar(255) NOT NULL DEFAULT 'Admin',
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_requests`
--

INSERT INTO `role_requests` (`id`, `user_id`, `requested_role`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 'Admin', 'approved', '2024-10-29 07:05:50', '2024-10-29 07:07:10'),
(2, 11, 'Author', 'pending', '2024-10-29 08:03:16', '2024-10-29 08:04:04'),
(3, 14, 'Author', 'approved', '2025-05-06 21:34:06', '2025-05-06 21:35:47'),
(4, 15, 'Author', 'rejected', '2025-05-23 18:39:45', '2025-05-23 19:20:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sejarahs`
--

CREATE TABLE `sejarahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `excerpt` text NOT NULL,
  `body` text NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sejarahs`
--

INSERT INTO `sejarahs` (`id`, `user_id`, `title`, `slug`, `image`, `excerpt`, `body`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sejarah Muhammadiyah', 'sejarah-muhammadiyah', 'post-images/IOmHP4g73uBqkDN5B4VxX6eDELK91dQSOevA3J1a.png', 'PrologMuhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan ki...', '<div><strong><br>Prolog<br></strong>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br>Selama satu abad, Muhammadiyah dikenal luas sebagai organisasi sosial-keagamaan yang sukses bergerak di ranah pendidikan, kesehatan, filantropi, dan pemberdayaan sosial secara independen serta terpercaya. Muhammadiyah mendirikan lembaga pendidikan dari jenjang dasar, menengah, dan tinggi; mendirikan rumah sakit, klinik, dan layanan kesehatan; dan melakukan pemberdayaan sosial-ekonomi yang tersebar di seluruh Indonesia untuk komunitas masyarakat urban, pedesaan, pedalaman, terpencil, kawasan kepulauan, masyarakat adat, serta di area rawan bencana.<br><br></div><div><strong>Sejarah Berdiri Muhammadiyah</strong></div><div>Muhammadiyah berdiri pada 8 Dzulhijjah 1330 H atau bertepatan pada tanggal 18 November 1912 di Kauman, kota Yogyakarta. Pendirian Muhammadiyah diawali oleh keberadaan Sekolah Rakyat bernama Madrasah Ibtidaiyah Diniyah Islamiyah yang didirikan KH. Ahmad Dahlan pada awal tahun 1912. Madrasah ini mengadakan proses belajar-mengajar pertama kali di dengan memanfaatkan ruangan berupa kamar tamu di rumah KH. Ahmad Dahlan yang memiliki panjang 6 meter dan lebar 2.5 meter, berisi tiga meja dan tiga kursi panjang serta satu papan tulis. Pada saat itu ada sembilan santri yang menjadi murid di Madrasah Ibtidaiyah Diniyah Islamiyah.</div>', NULL, '2024-11-02 07:45:52', '2024-11-02 08:06:19'),
(3, 1, 'Sejarah Aisyiyah', 'sejarah-aisyiyah', 'post-images/cpITQ20eEZqyaoO4qdNz7mZnVRRzWCWZkyO3Ply2.png', 'Islam Berkemajuan yang WasathiyahIdeologi Muhammadiyah adalah Islam Berkemajuan berpandangan wasathiyah. Sejak awal mula Muhammadiyah berdiri, KH. Ahmad Dahlan telah menekankan pentingnya Islam yang “...', '<div><strong>Islam Berkemajuan yang Wasathiyah<br></strong><br></div><div>Ideologi Muhammadiyah adalah Islam Berkemajuan berpandangan <em>wasathiyah</em>. Sejak awal mula Muhammadiyah berdiri, KH. Ahmad Dahlan telah menekankan pentingnya Islam yang “kemadjoean”. Islam bagi Muhammadiyah adalah <em>din al-hadlarah</em>. Islam adalah agama yang mengandung nilai-nilai kemajuan untuk mencerahkan dan mewujudkan kehidupan peradaban umat manusia yang berkeunggulan.<br><br></div>', NULL, '2024-11-02 08:07:34', '2024-11-02 08:07:34'),
(4, 1, 'test dulu', 'test', NULL, 'nm mkmnkn', '<div>nm mkmnkn</div>', NULL, '2024-11-05 08:11:09', '2024-11-10 09:45:24'),
(5, 1, 'Sejarah TK ABA', 'sejarah-tk-aba', 'post-images/3eadFHNQmGciMNnO4vK2r8AnwZNqTGWyyBz1ZXBi.jpg', 'test semoga berhasil', '<div>test semoga berhasil</div>', NULL, '2024-11-22 08:43:29', '2024-12-07 10:22:45'),
(6, 1, 'Sejarah Masjid Al Amien', 'sejarah-masjid-al-amien', 'post-images/3rQTFc54W7hxZzn57LUDg33287JqHcApqwBvngLw.jpg', 'PrologMuhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan ki...', '<div><strong><br>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div><div>Selama satu abad, Muhammadiyah dikenal luas sebagai organisasi sosial-keagamaan yang sukses bergerak di ranah pendidikan, kesehatan, filantropi, dan pemberdayaan sosial secara independen serta terpercaya. Muhammadiyah mendirikan lembaga pendidikan dari jenjang dasar, menengah, dan tinggi; mendirikan rumah sakit, klinik, dan layanan kesehatan; dan melakukan pemberdayaan sosial-ekonomi yang tersebar di seluruh Indonesia untuk komunitas masyarakat urban, pedesaan, pedalaman, terpencil, kawasan kepulauan, masyarakat adat, serta di area rawan bencana.<br><strong>Sejarah Berdiri Muhammadiyah<br></strong><br></div><div>Muhammadiyah berdiri pada 8 Dzulhijjah 1330 H atau bertepatan pada tanggal 18 November 1912 di Kauman, kota Yogyakarta. Pendirian Muhammadiyah diawali oleh keberadaan Sekolah Rakyat bernama Madrasah Ibtidaiyah Diniyah Islamiyah yang didirikan KH. Ahmad Dahlan pada awal tahun 1912. Madrasah ini mengadakan proses belajar-mengajar pertama kali di dengan memanfaatkan ruangan berupa kamar tamu di rumah KH. Ahmad Dahlan yang memiliki panjang 6 meter dan lebar 2.5 meter, berisi tiga meja dan tiga kursi panjang serta satu papan tulis. Pada saat itu ada sembilan santri yang menjadi murid di Madrasah Ibtidaiyah Diniyah Islamiyah.<br><br></div>', NULL, '2024-11-27 02:30:09', '2024-11-27 02:30:09'),
(7, 1, 'Sejarah Masjid Safinatullah', 'sejarah-masjid-safinatullah', 'post-images/xrPCGBiGRrVnPvkddoeRA6DqBaZ5pSttTgpQl47B.jpg', 'PrologMuhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan ki...', '<div><strong><br>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div><div>Selama satu abad, Muhammadiyah dikenal luas sebagai organisasi sosial-keagamaan yang sukses bergerak di ranah pendidikan, kesehatan, filantropi, dan pemberdayaan sosial secara independen serta terpercaya. Muhammadiyah mendirikan lembaga pendidikan dari jenjang dasar, menengah, dan tinggi; mendirikan rumah sakit, klinik, dan layanan kesehatan; dan melakukan pemberdayaan sosial-ekonomi yang tersebar di seluruh Indonesia untuk komunitas masyarakat urban, pedesaan, pedalaman, terpencil, kawasan kepulauan, masyarakat adat, serta di area rawan bencana.<br><strong>Sejarah Berdiri Muhammadiyah<br></strong><br></div><div>Muhammadiyah berdiri pada 8 Dzulhijjah 1330 H atau bertepatan pada tanggal 18 November 1912 di Kauman, kota Yogyakarta. Pendirian Muhammadiyah diawali oleh keberadaan Sekolah Rakyat bernama Madrasah Ibtidaiyah Diniyah Islamiyah yang didirikan KH. Ahmad Dahlan pada awal tahun 1912. Madrasah ini mengadakan proses belajar-mengajar pertama kali di dengan memanfaatkan ruangan berupa kamar tamu di rumah KH. Ahmad Dahlan yang memiliki panjang 6 meter dan lebar 2.5 meter, berisi tiga meja dan tiga kursi panjang serta satu papan tulis. Pada saat itu ada sembilan santri yang menjadi murid di Madrasah Ibtidaiyah Diniyah Islamiyah.</div>', NULL, '2024-11-27 18:59:52', '2024-11-27 18:59:52'),
(8, 1, 'Sejarah Masjid Baiturohman', 'sejarah-masjid-baiturohman', 'post-images/C2u3tDvQfvK1ls4kLaCSzEYBDeTuiq2AcsnVnKb2.jpg', 'PrologMuhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan ki...', '<div><strong>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div><div>Selama satu abad, Muhammadiyah dikenal luas sebagai organisasi sosial-keagamaan yang sukses bergerak di ranah pendidikan, kesehatan, filantropi, dan pemberdayaan sosial secara independen serta terpercaya. Muhammadiyah mendirikan lembaga pendidikan dari jenjang dasar, menengah, dan tinggi; mendirikan rumah sakit, klinik, dan layanan kesehatan; dan melakukan pemberdayaan sosial-ekonomi yang tersebar di seluruh Indonesia untuk komunitas masyarakat urban, pedesaan, pedalaman, terpencil, kawasan kepulauan, masyarakat adat, serta di area rawan bencana.<br><strong>Sejarah Berdiri Muhammadiyah<br></strong><br></div><div>Muhammadiyah berdiri pada 8 Dzulhijjah 1330 H atau bertepatan pada tanggal 18 November 1912 di Kauman, kota Yogyakarta. Pendirian Muhammadiyah diawali oleh keberadaan Sekolah Rakyat bernama Madrasah Ibtidaiyah Diniyah Islamiyah yang didirikan KH. Ahmad Dahlan pada awal tahun 1912. Madrasah ini mengadakan proses belajar-mengajar pertama kali di dengan memanfaatkan ruangan berupa kamar tamu di rumah KH. Ahmad Dahlan yang memiliki panjang 6 meter dan lebar 2.5 meter, berisi tiga meja dan tiga kursi panjang serta satu papan tulis. Pada saat itu ada sembilan santri yang menjadi murid di Madrasah Ibtidaiyah Diniyah Islamiyah.</div>', NULL, '2024-11-27 19:34:13', '2024-11-27 19:34:13'),
(9, 1, 'Sejarah Masjid Al Ikhsan', 'sejarah-masjid-al-ikhsan', 'post-images/WrCAVW2xB62LL94BZBNQ3RX3DVXmUOfIpbnzx4J9.webp', 'PrologMuhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan ki...', '<div><strong>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div><div>Selama satu abad, Muhammadiyah dikenal luas sebagai organisasi sosial-keagamaan yang sukses bergerak di ranah pendidikan, kesehatan, filantropi, dan pemberdayaan sosial secara independen serta terpercaya. Muhammadiyah mendirikan lembaga pendidikan dari jenjang dasar, menengah, dan tinggi; mendirikan rumah sakit, klinik, dan layanan kesehatan; dan melakukan pemberdayaan sosial-ekonomi yang tersebar di seluruh Indonesia untuk komunitas masyarakat urban, pedesaan, pedalaman, terpencil, kawasan kepulauan, masyarakat adat, serta di area rawan bencana.<br><strong>Sejarah Berdiri Muhammadiyah<br></strong><br></div><div>Muhammadiyah berdiri pada 8 Dzulhijjah 1330 H atau bertepatan pada tanggal 18 November 1912 di Kauman, kota Yogyakarta. Pendirian Muhammadiyah diawali oleh keberadaan Sekolah Rakyat bernama Madrasah Ibtidaiyah Diniyah Islamiyah yang didirikan KH. Ahmad Dahlan pada awal tahun 1912. Madrasah ini mengadakan proses belajar-mengajar pertama kali di dengan memanfaatkan ruangan berupa kamar tamu di rumah KH. Ahmad Dahlan yang memiliki panjang 6 meter dan lebar 2.5 meter, berisi tiga meja dan tiga kursi panjang serta satu papan tulis. Pada saat itu ada sembilan santri yang menjadi murid di Madrasah Ibtidaiyah Diniyah Islamiyah.</div>', NULL, '2024-11-27 19:34:44', '2024-11-27 19:34:44'),
(10, 1, 'Sejarah Masjid Al Khasanah', 'sejarah-masjid-al-khasanah', 'post-images/ZTbVFZlV5BBMaBSI9LJvmjjdlXYJpRSjL4PZaH8L.jpg', 'PrologMuhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan ki...', '<div><strong>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div><div>Selama satu abad, Muhammadiyah dikenal luas sebagai organisasi sosial-keagamaan yang sukses bergerak di ranah pendidikan, kesehatan, filantropi, dan pemberdayaan sosial secara independen serta terpercaya. Muhammadiyah mendirikan lembaga pendidikan dari jenjang dasar, menengah, dan tinggi; mendirikan rumah sakit, klinik, dan layanan kesehatan; dan melakukan pemberdayaan sosial-ekonomi yang tersebar di seluruh Indonesia untuk komunitas masyarakat urban, pedesaan, pedalaman, terpencil, kawasan kepulauan, masyarakat adat, serta di area rawan bencana.<br><strong>Sejarah Berdiri Muhammadiyah<br></strong><br></div><div>Muhammadiyah berdiri pada 8 Dzulhijjah 1330 H atau bertepatan pada tanggal 18 November 1912 di Kauman, kota Yogyakarta. Pendirian Muhammadiyah diawali oleh keberadaan Sekolah Rakyat bernama Madrasah Ibtidaiyah Diniyah Islamiyah yang didirikan KH. Ahmad Dahlan pada awal tahun 1912. Madrasah ini mengadakan proses belajar-mengajar pertama kali di dengan memanfaatkan ruangan berupa kamar tamu di rumah KH. Ahmad Dahlan yang memiliki panjang 6 meter dan lebar 2.5 meter, berisi tiga meja dan tiga kursi panjang serta satu papan tulis. Pada saat itu ada sembilan santri yang menjadi murid di Madrasah Ibtidaiyah Diniyah Islamiyah.</div>', NULL, '2024-11-27 19:35:13', '2024-11-27 19:35:13'),
(11, 1, 'Sejarah Masjid Al Hikmah', 'sejarah-masjid-al-hikmah', 'post-images/F45zB1kRERfe1cplvdQfw9cg9mAHaJ9IF7BK1cRQ.webp', 'PrologMuhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan ki...', '<div><strong>Prolog<br></strong><br></div><div>Muhammadiyah merupakan gerakan Islam modernis terbesar dan tertua di Indonesia yang masih eksis hingga hari ini. Muhammadiyah telah mendirikan 30 cabang istimewa di luar negeri dan melebarkan kiprah kemanusiaan ke berbagai negara dalam rangka menciptakan perdamaian global dan keadilan sosial. Anggota Muhammadiyah diprediksi berkisar antara 30 hingga 40 juta orang yang berasal dari berbagai latar belakang profesi, etnis, sosial, dan budaya.<br><br></div><div>Selama satu abad, Muhammadiyah dikenal luas sebagai organisasi sosial-keagamaan yang sukses bergerak di ranah pendidikan, kesehatan, filantropi, dan pemberdayaan sosial secara independen serta terpercaya. Muhammadiyah mendirikan lembaga pendidikan dari jenjang dasar, menengah, dan tinggi; mendirikan rumah sakit, klinik, dan layanan kesehatan; dan melakukan pemberdayaan sosial-ekonomi yang tersebar di seluruh Indonesia untuk komunitas masyarakat urban, pedesaan, pedalaman, terpencil, kawasan kepulauan, masyarakat adat, serta di area rawan bencana.<br><strong>Sejarah Berdiri Muhammadiyah<br></strong><br></div><div>Muhammadiyah berdiri pada 8 Dzulhijjah 1330 H atau bertepatan pada tanggal 18 November 1912 di Kauman, kota Yogyakarta. Pendirian Muhammadiyah diawali oleh keberadaan Sekolah Rakyat bernama Madrasah Ibtidaiyah Diniyah Islamiyah yang didirikan KH. Ahmad Dahlan pada awal tahun 1912. Madrasah ini mengadakan proses belajar-mengajar pertama kali di dengan memanfaatkan ruangan berupa kamar tamu di rumah KH. Ahmad Dahlan yang memiliki panjang 6 meter dan lebar 2.5 meter, berisi tiga meja dan tiga kursi panjang serta satu papan tulis. Pada saat itu ada sembilan santri yang menjadi murid di Madrasah Ibtidaiyah Diniyah Islamiyah.</div>', NULL, '2024-11-27 19:35:43', '2024-11-27 19:35:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `strukturorganisasi`
--

CREATE TABLE `strukturorganisasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `strukturorganisasi`
--

INSERT INTO `strukturorganisasi` (`id`, `title`, `slug`, `image`, `published_at`, `created_at`, `updated_at`, `kategori_id`) VALUES
(1, 'test1', 'test1', '1732725940_Struktur-6.png', NULL, '2024-11-27 08:40:57', '2024-11-27 09:45:40', 3),
(3, 'test gambar', 'test-gambar', '1732726070_Struktur-6.png', NULL, '2024-11-27 09:47:50', '2024-11-27 09:47:50', 1),
(4, 'Struktur Organisasi Masjid Al Amien', 'struktur-organisasi-masjid-al-amien', 'post-images/1732728058_Struktur-6.png', NULL, '2024-11-27 10:07:39', '2024-11-27 10:20:58', 3),
(6, 'test gambar2', 'test-gambar2', 'post-images/1732727964_Struktur-6.png', NULL, '2024-11-27 10:19:24', '2024-11-27 10:19:24', 1),
(7, 'Struktur Organisasi Muhammadiyah', 'struktur-organisasi-muhammadiyah', 'post-images/1732778153_Struktur-6.png', NULL, '2024-11-28 00:15:53', '2024-11-28 00:15:53', 1),
(8, 'Struktur Organisasi Aisyiyah', 'struktur-organisasi-aisyiyah', 'post-images/1732778171_Struktur-6.png', NULL, '2024-11-28 00:16:11', '2024-11-28 00:16:11', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `s_k_s`
--

CREATE TABLE `s_k_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_sk_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `s_k_s`
--

INSERT INTO `s_k_s` (`id`, `kategori_sk_id`, `title`, `slug`, `tahun`, `content`, `document`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', 'test', '2020', NULL, '1732630232_1773-Article Text-9426-1-10-20240512.pdf', NULL, '2024-11-26 07:10:32', '2024-11-26 07:10:32'),
(3, 3, '1test download', '1test-download', '2021', NULL, '1732677130_1773-Article Text-9426-1-10-20240512.pdf', NULL, '2024-11-26 08:52:21', '2024-11-26 20:12:10'),
(4, 2, 'Test SK1', 'test-sk1', '2020', NULL, '1732677301_1773-Article Text-9426-1-10-20240512.pdf', NULL, '2024-11-26 20:15:01', '2024-11-26 20:17:38'),
(5, 5, 'SK Ranting Masjid Al Amien', 'sk-ranting-masjid-al-amien', '2024', NULL, '1732709075_Kajian20241104061313.pdf', NULL, '2024-11-27 05:04:35', '2024-11-27 05:04:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `role` varchar(255) NOT NULL DEFAULT 'pengunjung'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`, `role`) VALUES
(1, 'M. Syafri Abidin', 'M. Syafri Abidin', 'syafri.abidin@gmail.com', NULL, '$2y$12$30UfQK2yc9jids80BNSUIexYJlEA/hyPdPPJmDD8DYyarPfR7BbJe', NULL, '2024-10-19 03:03:24', '2024-10-28 08:00:42', 1, 'Admin'),
(2, 'Ghaliyati Padmasari M.Pd', 'Ghaliyati Padmasari M.Pd', 'emong25@example.net', '2024-10-19 03:03:24', '$2y$12$1j7WbKFXA7mKGH7uKRAlhOL4gjSMVeZhsn8yfRjtljxeq5vQP.c6K', '0p4u02bPZE', '2024-10-19 03:03:24', '2024-10-28 08:00:33', 0, 'Author'),
(3, 'Icha Puspita S.I.Kom', 'Icha Puspita S.I.Kom', 'maulana.tiara@example.com', '2024-10-19 03:03:24', '$2y$12$1j7WbKFXA7mKGH7uKRAlhOL4gjSMVeZhsn8yfRjtljxeq5vQP.c6K', 'nXMiu4meW1', '2024-10-19 03:03:24', '2024-10-28 07:59:58', 0, 'Author'),
(4, 'Jona Prasasta', 'Jona Prasasta', 'rosman.rahmawati@example.com', '2024-10-19 03:03:24', '$2y$12$1j7WbKFXA7mKGH7uKRAlhOL4gjSMVeZhsn8yfRjtljxeq5vQP.c6K', 'KqK7QlCJ3j', '2024-10-19 03:03:24', '2024-10-28 07:59:45', 0, 'Author'),
(8, 'coba', 'coba', 'coba@gmail.com', NULL, '$2y$12$8OWGoTKi/AuL4v8at5nJEutPqbTSTtuyRstyCrH5/WfJeexUj6NVa', NULL, '2024-10-23 17:44:08', '2024-10-28 07:52:15', 1, 'Admin'),
(10, 'test', 'test', 'test@gmail.com', NULL, '$2y$12$jhb27f3G6wIwvRPQSg0SwO5jbsFyNHZrK0kQwoIALexjGhgTFkUua', NULL, '2024-10-28 07:53:18', '2024-10-29 07:07:10', 0, 'Admin'),
(11, 'cek', 'cek', 'cek@gmail.com', NULL, '$2y$12$dKmoCVoI4Too0u136yopVu/uuiMI52bkIAMEMqlmdqT8iwBg5T07C', NULL, '2024-10-29 07:48:37', '2024-10-29 08:04:04', 0, 'Admin\r\n\r\n'),
(12, 'ceklagi', 'ceklagi', 'ceklagi@gmail.com', NULL, '$2y$12$wx.0j2/oudgwCXkYf/wUkuvhad3XV6vG7.nxPT0vLFiZBq9U41xxW', NULL, '2024-10-29 08:21:05', '2024-10-29 08:21:05', 0, 'pengunjung'),
(14, 'pengunjung', 'pengunjung', 'pengunjung@gmail.com', NULL, '$2y$12$eqLCb10Rl/3vz7TrRg0boOkdrzQIMXCmUrO.wRkcVp2/diZFukFF6', NULL, '2025-05-06 21:33:42', '2025-05-06 21:35:47', 0, 'Author'),
(15, 'req', 'req', 'req@gmail.com', NULL, '$2y$12$UYzc4qEGPYjeoOTvlkcpgORKpl.yFnwmi1LA/mQRNGvluJaQms6KC', NULL, '2025-05-23 18:39:10', '2025-05-23 18:39:10', 0, 'pengunjung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `visitors`
--

INSERT INTO `visitors` (`id`, `date`, `count`, `created_at`, `updated_at`) VALUES
(1, '2024-12-11', 61, NULL, NULL),
(2, '2024-12-13', 945, NULL, NULL),
(3, '2024-12-14', 72, NULL, NULL),
(4, '2024-12-29', 49, NULL, NULL),
(5, '2025-01-13', 1617, NULL, NULL),
(6, '2025-01-14', 1399, NULL, NULL),
(7, '2025-01-16', 1002, NULL, NULL),
(8, '2025-02-03', 1, NULL, NULL),
(9, '2025-02-05', 77, NULL, NULL),
(10, '2025-02-06', 26, NULL, NULL),
(11, '2025-02-10', 245, NULL, NULL),
(12, '2025-02-11', 306, NULL, NULL),
(13, '2025-02-25', 49, NULL, NULL),
(14, '2025-02-26', 6, NULL, NULL),
(15, '2025-03-06', 10, NULL, NULL),
(16, '2025-03-08', 4, NULL, NULL),
(17, '2025-03-09', 22, NULL, NULL),
(18, '2025-03-11', 31, NULL, NULL),
(19, '2025-03-12', 26, NULL, NULL),
(20, '2025-03-18', 18, NULL, NULL),
(21, '2025-04-04', 30, NULL, NULL),
(22, '2025-04-15', 77, NULL, NULL),
(23, '2025-04-20', 21, NULL, NULL),
(24, '2025-04-23', 119, NULL, NULL),
(25, '2025-04-25', 46, NULL, NULL),
(26, '2025-04-27', 65, NULL, NULL),
(27, '2025-04-28', 35, NULL, NULL),
(28, '2025-04-29', 80, NULL, NULL),
(29, '2025-05-01', 46, NULL, NULL),
(30, '2025-05-07', 87, NULL, NULL),
(31, '2025-05-14', 22, NULL, NULL),
(32, '2025-05-15', 9, NULL, NULL),
(33, '2025-05-16', 84, NULL, NULL),
(34, '2025-05-19', 9, NULL, NULL),
(35, '2025-05-20', 51, NULL, NULL),
(36, '2025-05-22', 42, NULL, NULL),
(37, '2025-05-23', 25, NULL, NULL),
(38, '2025-05-24', 99, NULL, NULL),
(39, '2025-05-26', 14, NULL, NULL),
(40, '2025-05-27', 591, NULL, NULL),
(41, '2025-05-28', 235, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biodata_pimpinans`
--
ALTER TABLE `biodata_pimpinans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `biodata_pimpinan_slug_unique` (`slug`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inventaris_slug_unique` (`slug`);

--
-- Indeks untuk tabel `kajians`
--
ALTER TABLE `kajians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kajians_slug_unique` (`slug`);

--
-- Indeks untuk tabel `kategori_kajians`
--
ALTER TABLE `kategori_kajians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategorikajians_name_unique` (`name`),
  ADD UNIQUE KEY `kategorikajians_slug_unique` (`slug`);

--
-- Indeks untuk tabel `kategori_strukturorganisasi`
--
ALTER TABLE `kategori_strukturorganisasi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori_strukturorganisasi_slug_unique` (`slug`);

--
-- Indeks untuk tabel `kategori_s_k_s`
--
ALTER TABLE `kategori_s_k_s`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategorisk_slug_unique` (`slug`);

--
-- Indeks untuk tabel `lingkups`
--
ALTER TABLE `lingkups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lingkup_slug_unique` (`slug`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `musyawarahs`
--
ALTER TABLE `musyawarahs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `musyawarahs_slug_unique` (`slug`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pelaksana_programs`
--
ALTER TABLE `pelaksana_programs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pelaksanaprogram_slug_unique` (`slug`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indeks untuk tabel `role_requests`
--
ALTER TABLE `role_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_request_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `sejarahs`
--
ALTER TABLE `sejarahs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sejarah_slug_unique` (`slug`);

--
-- Indeks untuk tabel `strukturorganisasi`
--
ALTER TABLE `strukturorganisasi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `strukturorganisasi_slug_unique` (`slug`);

--
-- Indeks untuk tabel `s_k_s`
--
ALTER TABLE `s_k_s`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sk_slug_unique` (`slug`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biodata_pimpinans`
--
ALTER TABLE `biodata_pimpinans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kajians`
--
ALTER TABLE `kajians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `kategori_kajians`
--
ALTER TABLE `kategori_kajians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kategori_strukturorganisasi`
--
ALTER TABLE `kategori_strukturorganisasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kategori_s_k_s`
--
ALTER TABLE `kategori_s_k_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `lingkups`
--
ALTER TABLE `lingkups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `musyawarahs`
--
ALTER TABLE `musyawarahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelaksana_programs`
--
ALTER TABLE `pelaksana_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `role_requests`
--
ALTER TABLE `role_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sejarahs`
--
ALTER TABLE `sejarahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `strukturorganisasi`
--
ALTER TABLE `strukturorganisasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `s_k_s`
--
ALTER TABLE `s_k_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `role_requests`
--
ALTER TABLE `role_requests`
  ADD CONSTRAINT `role_request_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
