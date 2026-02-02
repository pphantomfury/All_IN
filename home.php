<?php
// Load the Composer autoloader
require_once 'vendor/autoload.php';

class Home
{
    private $repos = [];
    private $githubUsername = 'pphantomfury';

    public function __construct()
    {
        // Initialize GitHub Client and fetch data when class is instantiated
        $client = new \Github\Client();
        try {
            // We fetch the repositories and store them in a private variable
            $this->repos = $client->api('user')->repositories($this->githubUsername);
        } catch (Exception $e) {
            $this->repos = null; // Error handling
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
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
            <style>
                .modal {
                    display: none;
                    /* Hidden by default */
                    position: fixed;
                    z-index: 9999;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.7);
                    /* Black overlay */
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

                #map {
                    height: 500px;
                    width: 100%;
                    border-radius: 8px;
                }

                .btn-open-map {
                    background-color: #007bff;
                    color: white;
                    border: none;
                    padding: 15px 30px;
                    font-size: 18px;
                    border-radius: 8px;
                    cursor: pointer;
                    margin: 20px 0;
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
                <button class="explore-btn">Explore Now</button>

            </div>


            <div class="slider">
                <div class="slides">
                    <?php
                    $places = [
                        ["title" => "Archery", "topic" => "SITES", "text" => "Discover extraordinary Archery sites in Nairobi.", "img" => "https://plus.unsplash.com/premium_photo-1718315735010-a382235a28b7?w=800"],
                        ["title" => "Painting", "topic" => "SITES", "text" => "Discover extraordinary Painting sites in Nairobi.", "img" => "https://images.unsplash.com/photo-1764093457612-299b6638cd1e?w=800"],
                        ["title" => "Museum", "topic" => "SITES", "text" => "Discover extraordinary Museum sites in Nairobi.", "img" => "https://images.unsplash.com/photo-1725870007788-0a1cfe8b52c1?w=800"],
                        ["title" => "Park", "topic" => "SITES", "text" => "Discover extraordinary National Park sites in Nairobi.", "img" => "https://images.unsplash.com/photo-1706397637320-bb7cde0c91eb?w=800"]
                    ];

                    foreach ($places as $index => $place): ?>
                        <div class="slide <?= $index === 0 ? 'active' : '' ?>" data-title="<?= htmlspecialchars($place['title']) ?>"
                            data-topic="<?= htmlspecialchars($place['topic']) ?>"
                            data-text="<?= htmlspecialchars($place['text']) ?>">
                            <img src="<?= $place['img'] ?>" alt="<?= $place['title'] ?>">
                            <span><?= $place['title'] ?></span>
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
                    <div id="ai-response" class="chat-box">
                    </div>
                    <div class="chat-input-area">
                        <input type="text" id="user-query" placeholder="Ask about transport, fees, or best times...">
                        <button onclick="askAI()">Send</button>
                    </div>
                </div>
            </div>
            <div style="text-align: center; margin-top: 30px;">
                <button class="explore-btn" onclick="openAIChat()">Ask Our AI ChatBot </button>
                <button class="btn-open-map" onclick="toggleMap(true)">
                    📍 Open Our Location
                </button>

                <div id="mapModal" class="modal">
                    <div class="modal-content">
                        <span class="close-btn" onclick="toggleMap(false)">&times;</span>
                        <h2 style="color: #333">Our Location</h2>
                        <div id="map"></div>
                    </div>
                </div>


                <div class="repo-container">
                    <?php if ($this->repos): ?>
                        <?php foreach ($this->repos as $repo): ?>
                            <div class="repo-card">
                                <strong><?php echo htmlspecialchars($repo['name']); ?></strong><br>
                                <p style="font-size: 0.9rem; color: #888; margin-top: 5px;">
                                    <?= htmlspecialchars($repo['description'] ?? 'No description available'); ?>
                                </p>
                                <a href="<?php echo $repo['html_url']; ?>" target="_blank">View on GitHub →</a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>

                    <?php endif; ?>
                </div>
        </main>
        <?php
    }

    public function footer()
    {

        ?>

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <script>
            function openAIChat() {
                // 1. Grab the current active slide's data
                const activeSlide = document.querySelector('.slide.active');
                const topic = activeSlide.getAttribute('data-title');


                const initialMessage = `Hi! I see you're interested in ${topic} sites in Nairobi. Would you like me to check for available locations, transport costs from your area, or entry fees?`;

                // 3. Show the Modal (We'll create the HTML below)
                document.getElementById('ai-modal').style.display = 'block';
                document.getElementById('ai-response').innerText = initialMessage;

                // Store the topic for the API to use later
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
            let map; // Global map variable

            function toggleMap(show) {
                const modal = document.getElementById('mapModal');
                if (show) {
                    modal.style.display = "block";
                    // Initialize or resize map when modal opens
                    if (!map) {
                        initMap();
                    } else {
                        // Leaflet needs to recalculate size when hidden container becomes visible
                        setTimeout(() => { map.invalidateSize(); }, 200);
                    }
                } else {
                    modal.style.display = "none";
                }
            }

            function initMap() {
                map = L.map('map').setView([-1.3095, 36.8126], 15);
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap'
                }).addTo(map);

                L.marker([-1.3095, 36.8126]).addTo(map)
                    .bindPopup('<b>All_IN HQ</b><br>Strathmore University, Nairobi.')
                    .openPopup();
            }

            // Close modal if user clicks outside the box
            window.onclick = function (event) {
                const modal = document.getElementById('mapModal');
                if (event.target == modal) {
                    toggleMap(false);
                }
            }
        </script>
        <footer>
            <p>&copy; 2026 All IN. All Rights Reserved</p>
        </footer>
        <script>
            const slides = document.querySelectorAll('.slide');
            const heroTitle = document.getElementById('hero-title');
            const heroTopic = document.getElementById('hero-topic');
            const heroDesc = document.getElementById('hero-description');
            let current = 0;
            function updateHeroText(index) {
                const activeSlide = slides[index];
                const title = activeSlide.getAttribute('data-title');
                const topic = activeSlide.getAttribute('data-topic');
                const text = activeSlide.getAttribute('data-text');

                heroTitle.firstChild.textContent = title + "";
                heroTopic.textContent = topic;
                heroDesc.textContent = text;
            }
            // Initialize the first slide's text on page load
            updateHeroText(0);

            setInterval(() => {
                slides[current].classList.remove('active');
                current = (current + 1) % slides.length;
                slides[current].classList.add('active');
                // CALL THE UPDATE FUNCTION HERE
                updateHeroText(current);
            }, 8000);
        </script>

        </body>

        </html>
        <?php
    }
}