CREATE TABLE categories (
    id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(255) NOT NULL,
    description TEXT,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE articles (
    id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    image       VARCHAR(500),
    title       VARCHAR(255) NOT NULL,
    description TEXT,
    body        LONGTEXT NOT NULL,
    views       INT UNSIGNED NOT NULL DEFAULT 0,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE article_category (
    article_id  INT UNSIGNED NOT NULL,
    category_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (article_id, category_id),
    FOREIGN KEY (article_id)  REFERENCES articles(id)   ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);
