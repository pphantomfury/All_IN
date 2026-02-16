<?php
// Load the Composer autoloader
require_once 'vendor/autoload.php';

class home
{
    private $repos = [];
    private $githubUsername = 'pphantomfury';

    public function __construct()
    {
        $client = new \Github\Client();
        try {
            $this->repos = $client->api('user')->repositories($this->githubUsername);
        } catch (Exception $e) {
            $this->repos = null;
        }
    }

    public function header()
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Home</title>
            <link rel="stylesheet" href="styles.css">
            <style>
                .modal {
                    display: none;
                    position: fixed;
                    z-index: 9999;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.7);
                }

                .modal-content {
                    background-color: white;
                    margin: 5% auto;
                    padding: 20px;
                    border-radius: 12px;
                    width: 80%;
                    max-width: 800px;
                    position: relative;
                }

                .close-btn {
                    position: absolute;
                    right: 20px;
                    top: 10px;
                    font-size: 28px;
                    font-weight: bold;
                    cursor: pointer;
                    color: #333;
                }

                .repo-container {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                    gap: 15px;
                    margin-top: 20px;
                }

                .repo-card {
                    background: #f9f9f9;
                    padding: 15px;
                    border: 1px solid #ddd;
                    border-radius: 8px;
                }

                .explore-btn {
                    background-color: #ffb703;
                    color: #fff;
                    border: none;
                    padding: 15px 30px;
                    font-size: 18px;
                    border-radius: 8px;
                    cursor: pointer;
                }
            </style>
        </head>
        <?php
    }

    public function nav()
    {
        ?>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <?php
    }

    public function Content()
    {
        ?>
        <div class="hero">
            <div class="overlay"></div>
            <div class="hero-content">
                <h1 id="hero-title">ARCHERY<br><span id="hero-topic">SITES</span></h1>
                <p id="hero-description">Discover extraordinary services and breath-taking archery sites in Nairobi.</p>
                <button id="main-explore-btn" class="explore-btn">Explore Now</button>
            </div>

            <div class="slider">
                <div class="slides">
                    <?php
                    $places = [
                        ["title" => "Archery", "topic" => "SITES", "text" => "Discover extraordinary Archery sites in Nairobi.", "img" => "https://plus.unsplash.com/premium_photo-1718315735010-a382235a28b7?w=800", "url" => "archery.php"],
                        ["title" => "Painting", "topic" => "SITES", "text" => "Discover extraordinary Painting sites in Nairobi.", "img" => "https://images.unsplash.com/photo-1764093457612-299b6638cd1e?w=800", "url" => "painting.php"],
                        ["title" => "Museum", "topic" => "SITES", "text" => "Discover extraordinary Museum sites in Nairobi.", "img" => "https://images.unsplash.com/photo-1725870007788-0a1cfe8b52c1?w=800", "url" => "museum.php"],
                        ["title" => "Park", "topic" => "SITES", "text" => "Discover extraordinary National Park sites in Nairobi.", "img" => "https://images.unsplash.com/photo-1706397637320-bb7cde0c91eb?w=800", "url" => "park.php"],
                        ["title" => "Go carting", "topic" => "SITES", "text" => "Discover extraordinary Go carting sites in Nairobi.", "img" => "https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTYCT28rD0D0bVs5UlmWAi_Zbzxf_b7joN3lOshSBTa_61O3_2o3ThULLSGi_Sl", "url" => "gocarting.php"]
                    ];

                    foreach ($places as $index => $place): ?>
                        <div class="slide <?= $index === 0 ? 'active' : '' ?>" data-title="<?= htmlspecialchars($place['title']) ?>"
                            data-topic="<?= htmlspecialchars($place['topic']) ?>"
                            data-text="<?= htmlspecialchars($place['text']) ?>" data-url="<?= htmlspecialchars($place['url']) ?>">
                            <img src="<?= $place['img'] ?>" alt="<?= $place['title'] ?>">
                            <span>
                                <?= $place['title'] ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <main>
            <div id="ai-modal" class="modal">
                <div class="modal-content ai-chat">
                    <span class="close-btn" onclick="closeAI()">&times;</span>
                    <h2>AI Concierge: <span id="chat-topic" style="color:#ffb703"></span></h2>
                    <div id="ai-response" class="chat-box"></div>
                    <div class="chat-input-area">
                        <input type="text" id="user-query" placeholder="Ask about transport, fees, or best times...">
                        <button onclick="askAI()">Send</button>
                    </div>
                </div>
            </div>

            <div style="text-align: center; margin-top: 30px;">
                <button class="explore-btn" onclick="openAIChat()">Ask Our AI ChatBot</button>

                <div class="repo-container">
                    <?php if ($this->repos): ?>
                        <?php foreach ($this->repos as $repo): ?>
                            <div class="repo-card">
                                <strong>
                                    <?php echo htmlspecialchars($repo['name']); ?>
                                </strong><br>
                                <p style="font-size: 0.9rem; color: #888; margin-top: 5px;">
                                    <?= htmlspecialchars($repo['description'] ?? 'No description available'); ?>
                                </p>
                                <a href="<?php echo $repo['html_url']; ?>" target="_blank">View on GitHub →</a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </main>
        <?php
    }

    public function footer()
    {
        ?>
        <script>
            function openAIChat() {
                const activeSlide = document.querySelector('.slide.active');
                const topic = activeSlide.getAttribute('data-title');
                const initialMessage = `Hi! I see you're interested in ${topic} sites in Nairobi. Would you like me to check for available locations, transport costs from your area, or entry fees?`;

                document.getElementById('ai-modal').style.display = 'block';
                document.getElementById('ai-response').innerText = initialMessage;
                window.currentTopic = topic;
            }

            async function askAI() {
                const query = document.getElementById('user-query').value;
                const responseDiv = document.getElementById('ai-response');
                responseDiv.innerHTML += `<p><strong>You:</strong> ${query}</p>`;

                const response = await fetch('ai_handler.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ topic: window.currentTopic, query: query })
                });

                const data = await response.json();
                const aiText = data.choices[0].message.content;
                responseDiv.innerHTML += `<p><strong>AI:</strong> ${aiText}</p>`;
                document.getElementById('user-query').value = '';
            }

            function closeAI() {
                document.getElementById('ai-modal').style.display = 'none';
            }

            const slides = document.querySelectorAll('.slide');
            const heroTitle = document.getElementById('hero-title');
            const heroTopic = document.getElementById('hero-topic');
            const heroDesc = document.getElementById('hero-description');
            const exploreBtn = document.getElementById('main-explore-btn');
            let current = 0;

            function updateHeroText(index) {
                if (!slides[index] || !heroTitle) return;
                const activeSlide = slides[index];
                const title = activeSlide.getAttribute('data-title');
                const topic = activeSlide.getAttribute('data-topic');
                const text = activeSlide.getAttribute('data-text');
                const url = activeSlide.getAttribute('data-url');

                heroTitle.firstChild.textContent = title + " ";
                if (heroTopic) heroTopic.textContent = topic;
                if (heroDesc) heroDesc.textContent = text;

                if (exploreBtn) {
                    exploreBtn.onclick = function () {
                        if (url) window.location.href = url;
                    };
                }
            }

            if (slides.length > 0) {
                updateHeroText(0);
                setInterval(() => {
                    slides[current].classList.remove('active');
                    current = (current + 1) % slides.length;
                    slides[current].classList.add('active');
                    updateHeroText(current);
                }, 8000);
            }
        </script>
        <footer>
            <p>&copy; 2026 All IN. All Rights Reserved</p>
        </footer>
        </body>

        </html>
        <?php
    }
}