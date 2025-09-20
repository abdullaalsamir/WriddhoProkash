<?php
include '../includes/header.php';

// Get the book slug from URL
$slug = trim($_SERVER['REQUEST_URI'], '/');
$slug = basename($slug); // e.g. "krishnokaya"

// Book data (later this will come from DB)
$books = [
    "krishnokaya" => [
        "title" => "কৃষ্ণকায়া",
        "author" => "সাজ্জাদ সিয়াম",
        "price" => "৫০০৳",
        "cover" => "../assets/covers/Krishnokaya.png",
        "description" => "এই বইটি কৃষ্ণকায়া সম্পর্কে বিস্তৃত আলোচনা করে..."
    ]
];

// Load book details if found
$book = $books[$slug] ?? null;
?>

<main class="book-details">
    <?php if ($book): ?>
        <div class="book-details-container">
            <div class="book-cover-large">
                <img src="<?= $book['cover'] ?>" alt="<?= $book['title'] ?>">
            </div>
            <div class="book-info">
                <h1 class="book-title"><?= $book['title'] ?></h1>
                <p class="book-author">লেখক: <?= $book['author'] ?></p>
                <p class="book-price">মূল্য: <?= $book['price'] ?></p>
                <p class="book-description"><?= $book['description'] ?></p>
            </div>
        </div>
    <?php else: ?>
        <p>বইটি খুঁজে পাওয়া যায়নি।</p>
    <?php endif; ?>
</main>

<?php
include '../includes/footer.php';
?>