<?php
require_once 'home.php';
class Home
{
    public function header()
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>registeredHome </title>
            <link rel="stylesheet" href="styleSheet.css">
            <?php
    }
    public function nav()
    {
        ?>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="Map.php">Map</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <?php
    }

    public function Content()
    {
        ?>
            <div class="sidebar">
                <div class="sidebar-section">
                    <h2>Profile</h2>
                    <div class="user-info">
                        <p><strong>Welcome, User!</strong></p>
                    </div>
                    <ul>
                        <li><a href="profile.php">My Profile</a></li>
                        <li><a href="settings.php">Settings</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>

                <div class="sidebar-section">
                    <h2>Dashboard</h2>
                    <ul>
                        <li><a href="stats.php">Analytics</a></li>
                        <li><a href="tasks.php">Tasks</a></li>
                        <li><a href="messages.php">Messages</a></li>
                    </ul>
                </div>

                <div class="sidebar-section">
                    <h2>Location</h2>
                    <div class="mini-map-preview" style="background: #eee; height: 100px; margin-bottom: 10px;">
                        <p style="text-align:center; padding-top: 35px;">Mini Map Preview</p>
                    </div>
                    <ul>
                        <li><a href="full-map.php">View Full Map</a></li>
                    </ul>
                </div>
            </div>

            <div class="container">
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <img src="image1.jpg" style="width:100%">
                    </div>
                    <div class="mySlides fade">
                        <img src="image2.jpg" style="width:100%">
                    </div>
                    <div class="mySlides fade">
                        <img src="image3.jpg" style="width:100%">
                    </div>
                </div>
            </div>
            <h1>Welcome to the Home Page</h1>
            <p>This is the main content area.</p>

            <?php
    }
    public function footer()
    {
        ?>
            <footer>
                <p>&copy; 2026 All IN. All Rights Reserved</p>
            </footer>
            <?php
    }
}