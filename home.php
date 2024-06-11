<?php
const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'blog';

function createDBConnection(): mysqli {
  $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  return $conn;
}

function closeDBConnection(mysqli $conn): void {
  $conn->close();
}
function getAndPrintPostsFromDB(mysqli $conn): void {
    $sql = "SELECT * FROM test WHERE featured = 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($post = $result->fetch_assoc()) {
        include 'post_preview.php';
      }
    } else {
      echo "0 results";
    }
  }
  function getAndPrintPostsFromDB2(mysqli $conn): void {
    $sql = "SELECT * FROM test WHERE featured = 0";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($post = $result->fetch_assoc()) {
        include 'post_resent.php';
      }
    } else {
      echo "0 results";
    }
  }
  

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Let's do it together.</title>
    <link rel="stylesheet" href="styles/Index_style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="header_line">
                <div class="header_logo">
                    <a href="#">
                        <svg width="89" height="26" viewBox="0 0 89 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.478 12.266C9.478 11.5033 9.374 10.9573 9.166 10.628C8.958 10.2987 8.62867 10.0993 8.178 10.03C7.72733 9.96067 7.12933 9.94333 6.384 9.978L4.486 10.056V16.01C4.486 16.478 4.47733 16.8767 4.46 17.206C4.46 17.5353 4.44267 17.8127 4.408 18.038L9.374 17.96C10.1367 17.9427 10.7953 17.8213 11.35 17.596C11.9047 17.3533 12.338 16.9373 12.65 16.348C12.962 15.7587 13.118 14.9527 13.118 13.93H14.002L13.846 19H0.43V18.142C1.08867 18.1073 1.53933 17.96 1.782 17.7C2.02467 17.4227 2.15467 17.05 2.172 16.582C2.20667 16.0967 2.224 15.5507 2.224 14.944V3.712C2.224 3.36533 2.23267 3.036 2.25 2.724C2.26733 2.39467 2.28467 2.1 2.302 1.84C1.99 1.85733 1.678 1.87467 1.366 1.892C1.054 1.90933 0.742 1.92667 0.43 1.944V0.799999H12.936L13.066 5.35H12.208C12.208 4.32733 12.052 3.556 11.74 3.036C11.428 2.49867 11.0033 2.14333 10.466 1.97C9.946 1.77933 9.35667 1.69267 8.698 1.71L6.462 1.762C5.82067 1.77933 5.36133 1.90067 5.084 2.126C4.80667 2.35133 4.63333 2.68933 4.564 3.14C4.512 3.57333 4.486 4.14533 4.486 4.856V9.016L9.374 9.042L9.192 6.806H10.336V12.266H9.478ZM21.6478 19.416C20.7812 19.416 20.0098 19.2947 19.3338 19.052C18.6578 18.8267 18.1032 18.5667 17.6698 18.272L17.7738 19.182H16.6818L16.5258 14.71H17.3318C17.3665 15.4207 17.5658 16.062 17.9298 16.634C18.2938 17.1887 18.7618 17.622 19.3338 17.934C19.9058 18.246 20.5212 18.402 21.1798 18.402C21.6305 18.402 22.0725 18.3327 22.5058 18.194C22.9392 18.038 23.3032 17.8127 23.5978 17.518C23.8925 17.206 24.0398 16.816 24.0398 16.348C24.0398 15.8627 23.8925 15.464 23.5978 15.152C23.3205 14.8227 22.9478 14.5367 22.4798 14.294C22.0118 14.0513 21.5092 13.826 20.9718 13.618C20.4518 13.41 19.9318 13.1933 19.4118 12.968C18.8918 12.7427 18.4065 12.474 17.9558 12.162C17.5225 11.85 17.1758 11.4687 16.9158 11.018C16.6558 10.5673 16.5258 10.0127 16.5258 9.354C16.5258 8.99 16.5952 8.59133 16.7338 8.158C16.8725 7.72467 17.1065 7.31733 17.4358 6.936C17.7652 6.53733 18.2158 6.21667 18.7878 5.974C19.3598 5.714 20.0878 5.584 20.9718 5.584C21.4398 5.584 21.9598 5.662 22.5318 5.818C23.1038 5.974 23.6585 6.26867 24.1958 6.702L24.1438 5.714H25.2358V10.264H24.4038C24.3692 9.65733 24.2305 9.07667 23.9878 8.522C23.7452 7.95 23.3898 7.482 22.9218 7.118C22.4538 6.73667 21.8472 6.546 21.1018 6.546C20.3045 6.546 19.6805 6.74533 19.2298 7.144C18.7792 7.54267 18.5538 8.002 18.5538 8.522C18.5538 9.05933 18.7185 9.51 19.0478 9.874C19.3945 10.2207 19.8365 10.524 20.3738 10.784C20.9112 11.044 21.4832 11.2953 22.0898 11.538C22.7485 11.8153 23.3898 12.1187 24.0138 12.448C24.6378 12.7773 25.1492 13.1933 25.5478 13.696C25.9465 14.1813 26.1458 14.814 26.1458 15.594C26.1458 16.4607 25.9205 17.18 25.4698 17.752C25.0365 18.324 24.4732 18.74 23.7798 19C23.1038 19.2773 22.3932 19.416 21.6478 19.416ZM34.697 19.416C33.5357 19.416 32.461 19.156 31.473 18.636C30.5023 18.0987 29.7223 17.336 29.133 16.348C28.561 15.3427 28.275 14.138 28.275 12.734C28.275 11.8327 28.4397 10.9573 28.769 10.108C29.0983 9.25867 29.5577 8.496 30.147 7.82C30.7537 7.12667 31.473 6.58067 32.305 6.182C33.137 5.78333 34.0557 5.584 35.061 5.584C36.0317 5.584 36.8723 5.73133 37.583 6.026C38.311 6.32067 38.8743 6.71067 39.273 7.196C39.6717 7.68133 39.871 8.21 39.871 8.782C39.871 9.16333 39.767 9.49267 39.559 9.77C39.351 10.03 39.0477 10.16 38.649 10.16C38.2157 10.1773 37.9037 10.0473 37.713 9.77C37.5397 9.47533 37.453 9.21533 37.453 8.99C37.453 8.81667 37.479 8.64333 37.531 8.47C37.583 8.27933 37.687 8.106 37.843 7.95C37.7043 7.534 37.4617 7.23067 37.115 7.04C36.7683 6.832 36.4043 6.702 36.023 6.65C35.659 6.58067 35.3557 6.546 35.113 6.546C33.9343 6.546 32.9377 7.02267 32.123 7.976C31.3257 8.912 30.927 10.2813 30.927 12.084C30.927 13.2453 31.109 14.2767 31.473 15.178C31.8543 16.0793 32.383 16.79 33.059 17.31C33.735 17.8127 34.515 18.064 35.399 18.064C36.2137 18.064 36.9937 17.8473 37.739 17.414C38.4843 16.9807 39.065 16.452 39.481 15.828L40.157 16.348C39.7063 17.076 39.1603 17.6653 38.519 18.116C37.895 18.5667 37.245 18.896 36.569 19.104C35.9103 19.312 35.2863 19.416 34.697 19.416ZM50.0441 19C49.9921 18.7053 49.9574 18.4453 49.9401 18.22C49.9228 17.9947 49.8968 17.7607 49.8621 17.518C49.2728 18.1073 48.6314 18.5753 47.9381 18.922C47.2621 19.2513 46.5428 19.416 45.7801 19.416C44.4628 19.416 43.4834 19.1213 42.8421 18.532C42.2008 17.9253 41.8801 17.1887 41.8801 16.322C41.8801 15.5247 42.1228 14.84 42.6081 14.268C43.1108 13.6787 43.7521 13.202 44.5321 12.838C45.3294 12.4567 46.1874 12.1793 47.1061 12.006C48.0421 11.8153 48.9434 11.7287 49.8101 11.746V10.134C49.8101 9.52733 49.7581 8.95533 49.6541 8.418C49.5501 7.88067 49.3248 7.43867 48.9781 7.092C48.6314 6.74533 48.0768 6.56333 47.3141 6.546C46.8114 6.52867 46.2914 6.624 45.7541 6.832C45.2341 7.04 44.8528 7.39533 44.6101 7.898C44.7488 8.03667 44.8354 8.20133 44.8701 8.392C44.9221 8.56533 44.9481 8.73 44.9481 8.886C44.9481 9.094 44.8614 9.33667 44.6881 9.614C44.5148 9.874 44.2114 9.99533 43.7781 9.978C43.4141 9.978 43.1368 9.85667 42.9461 9.614C42.7554 9.354 42.6601 9.05067 42.6601 8.704C42.6601 8.11467 42.8768 7.586 43.3101 7.118C43.7608 6.65 44.3761 6.27733 45.1561 6C45.9361 5.72267 46.8201 5.584 47.8081 5.584C49.2641 5.584 50.3388 5.974 51.0321 6.754C51.7254 7.51667 52.0634 8.73 52.0461 10.394C52.0461 11.0353 52.0461 11.6853 52.0461 12.344C52.0461 12.9853 52.0374 13.6353 52.0201 14.294C52.0201 14.9353 52.0201 15.5853 52.0201 16.244C52.0201 16.5213 52.0114 16.7987 51.9941 17.076C51.9768 17.3533 51.9508 17.6653 51.9161 18.012C52.2281 17.9947 52.5314 17.9773 52.8261 17.96C53.1381 17.9427 53.4501 17.9253 53.7621 17.908V19H50.0441ZM49.8101 12.63C49.2208 12.6473 48.5968 12.7253 47.9381 12.864C47.2968 12.9853 46.6988 13.176 46.1441 13.436C45.6068 13.696 45.1648 14.0427 44.8181 14.476C44.4888 14.892 44.3328 15.4033 44.3501 16.01C44.3848 16.6513 44.5928 17.1367 44.9741 17.466C45.3728 17.778 45.8408 17.934 46.3781 17.934C47.0888 17.934 47.7041 17.804 48.2241 17.544C48.7614 17.2667 49.2901 16.8853 49.8101 16.4C49.7928 16.2093 49.7841 16.0013 49.7841 15.776C49.7841 15.5507 49.7841 15.3167 49.7841 15.074C49.7841 14.9873 49.7841 14.71 49.7841 14.242C49.8014 13.774 49.8101 13.2367 49.8101 12.63ZM55.3123 25.63V24.85C55.8497 24.85 56.2223 24.7113 56.4303 24.434C56.6383 24.174 56.7597 23.8013 56.7943 23.316C56.829 22.848 56.8463 22.302 56.8463 21.678L56.8983 9.12C56.8983 8.84267 56.8983 8.56533 56.8983 8.288C56.9157 8.01067 56.9503 7.72467 57.0023 7.43C56.6903 7.44733 56.3783 7.46467 56.0663 7.482C55.7717 7.49933 55.4683 7.51667 55.1563 7.534V6.442C55.919 6.442 56.491 6.40733 56.8723 6.338C57.271 6.26867 57.557 6.182 57.7303 6.078C57.921 5.974 58.077 5.86133 58.1983 5.74H58.9783C58.9957 5.91333 59.013 6.12133 59.0303 6.364C59.0477 6.58933 59.065 6.84933 59.0823 7.144C59.6023 6.676 60.2177 6.30333 60.9283 6.026C61.6563 5.73133 62.3843 5.584 63.1123 5.584C64.1177 5.584 65.0537 5.844 65.9203 6.364C66.787 6.884 67.489 7.62933 68.0263 8.6C68.5637 9.55333 68.8323 10.6973 68.8323 12.032C68.8323 13.5053 68.5203 14.7967 67.8963 15.906C67.2897 17.0153 66.4837 17.882 65.4783 18.506C64.473 19.1127 63.381 19.416 62.2023 19.416C61.5957 19.416 61.0323 19.338 60.5123 19.182C60.0097 19.0433 59.533 18.8353 59.0823 18.558V22.874C59.0823 23.2207 59.0737 23.524 59.0563 23.784C59.0563 24.0613 59.0303 24.3473 58.9783 24.642C59.2557 24.6247 59.5243 24.6073 59.7843 24.59C60.0617 24.59 60.339 24.5813 60.6163 24.564V25.63H55.3123ZM62.1503 18.376C62.9823 18.376 63.693 18.1247 64.2823 17.622C64.889 17.102 65.3483 16.4 65.6603 15.516C65.9897 14.6147 66.1543 13.592 66.1543 12.448C66.1543 11.512 66.0157 10.6193 65.7383 9.77C65.4783 8.90333 65.0537 8.20133 64.4643 7.664C63.8923 7.12667 63.1297 6.858 62.1763 6.858C61.587 6.858 61.015 7.00533 60.4603 7.3C59.923 7.57733 59.4723 7.91533 59.1083 8.314C59.1083 8.38333 59.1083 8.48733 59.1083 8.626C59.1257 8.74733 59.1343 8.97267 59.1343 9.302C59.1343 9.614 59.1343 10.0907 59.1343 10.732C59.1343 11.356 59.1257 12.2053 59.1083 13.28C59.1083 14.3547 59.1083 15.7153 59.1083 17.362C59.5417 17.6913 60.0097 17.9427 60.5123 18.116C61.0323 18.2893 61.5783 18.376 62.1503 18.376ZM77.352 19.416C76.156 19.416 75.0727 19.1387 74.102 18.584C73.1487 18.012 72.3947 17.2147 71.84 16.192C71.2853 15.152 71.008 13.93 71.008 12.526C71.008 11.3127 71.2767 10.1773 71.814 9.12C72.3687 8.06267 73.14 7.21333 74.128 6.572C75.116 5.91333 76.26 5.584 77.56 5.584C78.288 5.584 78.964 5.70533 79.588 5.948C80.2293 6.17333 80.7927 6.52867 81.278 7.014C81.7633 7.482 82.1447 8.08 82.422 8.808C82.6993 9.51867 82.838 10.3593 82.838 11.33L73.686 11.486C73.686 12.8033 73.8247 13.9647 74.102 14.97C74.3967 15.958 74.8647 16.7293 75.506 17.284C76.1473 17.8213 76.9707 18.09 77.976 18.09C78.5133 18.09 79.0593 17.9947 79.614 17.804C80.186 17.6133 80.7147 17.3533 81.2 17.024C81.6853 16.6947 82.0753 16.3307 82.37 15.932L82.994 16.452C82.526 17.18 81.9627 17.7607 81.304 18.194C80.6453 18.6273 79.9693 18.9393 79.276 19.13C78.5827 19.3207 77.9413 19.416 77.352 19.416ZM73.764 10.394H80.394C80.394 9.77 80.2987 9.172 80.108 8.6C79.9347 8.01067 79.64 7.534 79.224 7.17C78.808 6.78867 78.262 6.598 77.586 6.598C76.5807 6.598 75.74 6.90133 75.064 7.508C74.4053 8.09733 73.972 9.05933 73.764 10.394ZM87.1798 19.416C86.7811 19.416 86.4258 19.26 86.1138 18.948C85.8191 18.6187 85.6718 18.22 85.6718 17.752C85.6718 17.284 85.8278 16.8853 86.1398 16.556C86.4518 16.2267 86.8071 16.062 87.2058 16.062C87.6391 16.062 87.9945 16.2267 88.2718 16.556C88.5665 16.8853 88.7138 17.284 88.7138 17.752C88.7138 18.22 88.5578 18.6187 88.2458 18.948C87.9338 19.26 87.5785 19.416 87.1798 19.416Z" fill="white"/>
                        </svg>    
                    </a>     
                </div>
                <div class="nav">
                    <ul class="nav_list">
                        <li class="nav_item">
                            <a href="@" class="nav_link">HOME</a>
                        </li>
                        <li class="nav_item">
                            <a href="@" class="nav_link">CATEGORIES</a>
                        </li>
                        <li class="nav_item">
                            <a href="@" class="nav_link">ABOUT</a>
                        </li>
                        <li class="nav_item">
                            <a href="@" class="nav_link">CONTACT</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="header_main">
                <div class="header_title">
                    Let's do it together.
                </div>
                <div class="header_subtitle">
                    We travel the world in search of stories. Come along for the ride.
                </div>
                <div class="btn">
                    <a class="button" href="#">View Latest Posts</a>
                </div>
            </div>
        </div>
    </div>
    <div class="header_down">
        <div class="header_down_line">
            <div class="down_nav">
                <ul class="down_nav_list">
                    <li class="down_nav_item">
                        <a href="@" class="down_nav_link">Nature</a>
                    </li>
                    <li class="down_nav_item">
                        <a href="@" class="down_nav_link">Photography</a>
                    </li>
                    <li class="down_nav_item">
                        <a href="@" class="down_nav_link">Relaxation</a>
                    </li>
                    <li class="down_nav_item">
                        <a href="@" class="down_nav_link">Vacation</a>
                    </li>
                    <li class="down_nav_item">
                        <a href="@" class="down_nav_link">Travel</a>
                    </li>
                    <li class="down_nav_item">
                        <a href="@" class="down_nav_link">Adventure</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="main_up">
            <div class="main_up_container">
                <div class="main_up_title">
                    Featured Posts          
                </div>
            </div>
            <div class="main_up_nav">
                <ul class="main-up__posts">
                <?php 
                $conn = createDBConnection();
                getAndPrintPostsFromDB($conn);
                ?>
                </ul>    
            </div>
        </div>
        <div class="main_down">
            <div class="main_down_container">
                <div class="main_down_title">
                    Most Recent          
                </div>
            </div>
            <ul class="main-down__posts">
            <?php
            getAndPrintPostsFromDB2($conn);
            ?>
            </ul>
        </div>
    </div>
    <div class="footer">
        <div class="footer_container">
            <div class="footer_line">
                <div class="footer_logo">
                    <svg class="footer_logo_item" width="89" height="26" viewBox="0 0 89 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.478 12.266C9.478 11.5033 9.374 10.9573 9.166 10.628C8.958 10.2987 8.62867 10.0993 8.178 10.03C7.72733 9.96067 7.12933 9.94333 6.384 9.978L4.486 10.056V16.01C4.486 16.478 4.47733 16.8767 4.46 17.206C4.46 17.5353 4.44267 17.8127 4.408 18.038L9.374 17.96C10.1367 17.9427 10.7953 17.8213 11.35 17.596C11.9047 17.3533 12.338 16.9373 12.65 16.348C12.962 15.7587 13.118 14.9527 13.118 13.93H14.002L13.846 19H0.43V18.142C1.08867 18.1073 1.53933 17.96 1.782 17.7C2.02467 17.4227 2.15467 17.05 2.172 16.582C2.20667 16.0967 2.224 15.5507 2.224 14.944V3.712C2.224 3.36533 2.23267 3.036 2.25 2.724C2.26733 2.39467 2.28467 2.1 2.302 1.84C1.99 1.85733 1.678 1.87467 1.366 1.892C1.054 1.90933 0.742 1.92667 0.43 1.944V0.799999H12.936L13.066 5.35H12.208C12.208 4.32733 12.052 3.556 11.74 3.036C11.428 2.49867 11.0033 2.14333 10.466 1.97C9.946 1.77933 9.35667 1.69267 8.698 1.71L6.462 1.762C5.82067 1.77933 5.36133 1.90067 5.084 2.126C4.80667 2.35133 4.63333 2.68933 4.564 3.14C4.512 3.57333 4.486 4.14533 4.486 4.856V9.016L9.374 9.042L9.192 6.806H10.336V12.266H9.478ZM21.6478 19.416C20.7812 19.416 20.0098 19.2947 19.3338 19.052C18.6578 18.8267 18.1032 18.5667 17.6698 18.272L17.7738 19.182H16.6818L16.5258 14.71H17.3318C17.3665 15.4207 17.5658 16.062 17.9298 16.634C18.2938 17.1887 18.7618 17.622 19.3338 17.934C19.9058 18.246 20.5212 18.402 21.1798 18.402C21.6305 18.402 22.0725 18.3327 22.5058 18.194C22.9392 18.038 23.3032 17.8127 23.5978 17.518C23.8925 17.206 24.0398 16.816 24.0398 16.348C24.0398 15.8627 23.8925 15.464 23.5978 15.152C23.3205 14.8227 22.9478 14.5367 22.4798 14.294C22.0118 14.0513 21.5092 13.826 20.9718 13.618C20.4518 13.41 19.9318 13.1933 19.4118 12.968C18.8918 12.7427 18.4065 12.474 17.9558 12.162C17.5225 11.85 17.1758 11.4687 16.9158 11.018C16.6558 10.5673 16.5258 10.0127 16.5258 9.354C16.5258 8.99 16.5952 8.59133 16.7338 8.158C16.8725 7.72467 17.1065 7.31733 17.4358 6.936C17.7652 6.53733 18.2158 6.21667 18.7878 5.974C19.3598 5.714 20.0878 5.584 20.9718 5.584C21.4398 5.584 21.9598 5.662 22.5318 5.818C23.1038 5.974 23.6585 6.26867 24.1958 6.702L24.1438 5.714H25.2358V10.264H24.4038C24.3692 9.65733 24.2305 9.07667 23.9878 8.522C23.7452 7.95 23.3898 7.482 22.9218 7.118C22.4538 6.73667 21.8472 6.546 21.1018 6.546C20.3045 6.546 19.6805 6.74533 19.2298 7.144C18.7792 7.54267 18.5538 8.002 18.5538 8.522C18.5538 9.05933 18.7185 9.51 19.0478 9.874C19.3945 10.2207 19.8365 10.524 20.3738 10.784C20.9112 11.044 21.4832 11.2953 22.0898 11.538C22.7485 11.8153 23.3898 12.1187 24.0138 12.448C24.6378 12.7773 25.1492 13.1933 25.5478 13.696C25.9465 14.1813 26.1458 14.814 26.1458 15.594C26.1458 16.4607 25.9205 17.18 25.4698 17.752C25.0365 18.324 24.4732 18.74 23.7798 19C23.1038 19.2773 22.3932 19.416 21.6478 19.416ZM34.697 19.416C33.5357 19.416 32.461 19.156 31.473 18.636C30.5023 18.0987 29.7223 17.336 29.133 16.348C28.561 15.3427 28.275 14.138 28.275 12.734C28.275 11.8327 28.4397 10.9573 28.769 10.108C29.0983 9.25867 29.5577 8.496 30.147 7.82C30.7537 7.12667 31.473 6.58067 32.305 6.182C33.137 5.78333 34.0557 5.584 35.061 5.584C36.0317 5.584 36.8723 5.73133 37.583 6.026C38.311 6.32067 38.8743 6.71067 39.273 7.196C39.6717 7.68133 39.871 8.21 39.871 8.782C39.871 9.16333 39.767 9.49267 39.559 9.77C39.351 10.03 39.0477 10.16 38.649 10.16C38.2157 10.1773 37.9037 10.0473 37.713 9.77C37.5397 9.47533 37.453 9.21533 37.453 8.99C37.453 8.81667 37.479 8.64333 37.531 8.47C37.583 8.27933 37.687 8.106 37.843 7.95C37.7043 7.534 37.4617 7.23067 37.115 7.04C36.7683 6.832 36.4043 6.702 36.023 6.65C35.659 6.58067 35.3557 6.546 35.113 6.546C33.9343 6.546 32.9377 7.02267 32.123 7.976C31.3257 8.912 30.927 10.2813 30.927 12.084C30.927 13.2453 31.109 14.2767 31.473 15.178C31.8543 16.0793 32.383 16.79 33.059 17.31C33.735 17.8127 34.515 18.064 35.399 18.064C36.2137 18.064 36.9937 17.8473 37.739 17.414C38.4843 16.9807 39.065 16.452 39.481 15.828L40.157 16.348C39.7063 17.076 39.1603 17.6653 38.519 18.116C37.895 18.5667 37.245 18.896 36.569 19.104C35.9103 19.312 35.2863 19.416 34.697 19.416ZM50.0441 19C49.9921 18.7053 49.9574 18.4453 49.9401 18.22C49.9228 17.9947 49.8968 17.7607 49.8621 17.518C49.2728 18.1073 48.6314 18.5753 47.9381 18.922C47.2621 19.2513 46.5428 19.416 45.7801 19.416C44.4628 19.416 43.4834 19.1213 42.8421 18.532C42.2008 17.9253 41.8801 17.1887 41.8801 16.322C41.8801 15.5247 42.1228 14.84 42.6081 14.268C43.1108 13.6787 43.7521 13.202 44.5321 12.838C45.3294 12.4567 46.1874 12.1793 47.1061 12.006C48.0421 11.8153 48.9434 11.7287 49.8101 11.746V10.134C49.8101 9.52733 49.7581 8.95533 49.6541 8.418C49.5501 7.88067 49.3248 7.43867 48.9781 7.092C48.6314 6.74533 48.0768 6.56333 47.3141 6.546C46.8114 6.52867 46.2914 6.624 45.7541 6.832C45.2341 7.04 44.8528 7.39533 44.6101 7.898C44.7488 8.03667 44.8354 8.20133 44.8701 8.392C44.9221 8.56533 44.9481 8.73 44.9481 8.886C44.9481 9.094 44.8614 9.33667 44.6881 9.614C44.5148 9.874 44.2114 9.99533 43.7781 9.978C43.4141 9.978 43.1368 9.85667 42.9461 9.614C42.7554 9.354 42.6601 9.05067 42.6601 8.704C42.6601 8.11467 42.8768 7.586 43.3101 7.118C43.7608 6.65 44.3761 6.27733 45.1561 6C45.9361 5.72267 46.8201 5.584 47.8081 5.584C49.2641 5.584 50.3388 5.974 51.0321 6.754C51.7254 7.51667 52.0634 8.73 52.0461 10.394C52.0461 11.0353 52.0461 11.6853 52.0461 12.344C52.0461 12.9853 52.0374 13.6353 52.0201 14.294C52.0201 14.9353 52.0201 15.5853 52.0201 16.244C52.0201 16.5213 52.0114 16.7987 51.9941 17.076C51.9768 17.3533 51.9508 17.6653 51.9161 18.012C52.2281 17.9947 52.5314 17.9773 52.8261 17.96C53.1381 17.9427 53.4501 17.9253 53.7621 17.908V19H50.0441ZM49.8101 12.63C49.2208 12.6473 48.5968 12.7253 47.9381 12.864C47.2968 12.9853 46.6988 13.176 46.1441 13.436C45.6068 13.696 45.1648 14.0427 44.8181 14.476C44.4888 14.892 44.3328 15.4033 44.3501 16.01C44.3848 16.6513 44.5928 17.1367 44.9741 17.466C45.3728 17.778 45.8408 17.934 46.3781 17.934C47.0888 17.934 47.7041 17.804 48.2241 17.544C48.7614 17.2667 49.2901 16.8853 49.8101 16.4C49.7928 16.2093 49.7841 16.0013 49.7841 15.776C49.7841 15.5507 49.7841 15.3167 49.7841 15.074C49.7841 14.9873 49.7841 14.71 49.7841 14.242C49.8014 13.774 49.8101 13.2367 49.8101 12.63ZM55.3123 25.63V24.85C55.8497 24.85 56.2223 24.7113 56.4303 24.434C56.6383 24.174 56.7597 23.8013 56.7943 23.316C56.829 22.848 56.8463 22.302 56.8463 21.678L56.8983 9.12C56.8983 8.84267 56.8983 8.56533 56.8983 8.288C56.9157 8.01067 56.9503 7.72467 57.0023 7.43C56.6903 7.44733 56.3783 7.46467 56.0663 7.482C55.7717 7.49933 55.4683 7.51667 55.1563 7.534V6.442C55.919 6.442 56.491 6.40733 56.8723 6.338C57.271 6.26867 57.557 6.182 57.7303 6.078C57.921 5.974 58.077 5.86133 58.1983 5.74H58.9783C58.9957 5.91333 59.013 6.12133 59.0303 6.364C59.0477 6.58933 59.065 6.84933 59.0823 7.144C59.6023 6.676 60.2177 6.30333 60.9283 6.026C61.6563 5.73133 62.3843 5.584 63.1123 5.584C64.1177 5.584 65.0537 5.844 65.9203 6.364C66.787 6.884 67.489 7.62933 68.0263 8.6C68.5637 9.55333 68.8323 10.6973 68.8323 12.032C68.8323 13.5053 68.5203 14.7967 67.8963 15.906C67.2897 17.0153 66.4837 17.882 65.4783 18.506C64.473 19.1127 63.381 19.416 62.2023 19.416C61.5957 19.416 61.0323 19.338 60.5123 19.182C60.0097 19.0433 59.533 18.8353 59.0823 18.558V22.874C59.0823 23.2207 59.0737 23.524 59.0563 23.784C59.0563 24.0613 59.0303 24.3473 58.9783 24.642C59.2557 24.6247 59.5243 24.6073 59.7843 24.59C60.0617 24.59 60.339 24.5813 60.6163 24.564V25.63H55.3123ZM62.1503 18.376C62.9823 18.376 63.693 18.1247 64.2823 17.622C64.889 17.102 65.3483 16.4 65.6603 15.516C65.9897 14.6147 66.1543 13.592 66.1543 12.448C66.1543 11.512 66.0157 10.6193 65.7383 9.77C65.4783 8.90333 65.0537 8.20133 64.4643 7.664C63.8923 7.12667 63.1297 6.858 62.1763 6.858C61.587 6.858 61.015 7.00533 60.4603 7.3C59.923 7.57733 59.4723 7.91533 59.1083 8.314C59.1083 8.38333 59.1083 8.48733 59.1083 8.626C59.1257 8.74733 59.1343 8.97267 59.1343 9.302C59.1343 9.614 59.1343 10.0907 59.1343 10.732C59.1343 11.356 59.1257 12.2053 59.1083 13.28C59.1083 14.3547 59.1083 15.7153 59.1083 17.362C59.5417 17.6913 60.0097 17.9427 60.5123 18.116C61.0323 18.2893 61.5783 18.376 62.1503 18.376ZM77.352 19.416C76.156 19.416 75.0727 19.1387 74.102 18.584C73.1487 18.012 72.3947 17.2147 71.84 16.192C71.2853 15.152 71.008 13.93 71.008 12.526C71.008 11.3127 71.2767 10.1773 71.814 9.12C72.3687 8.06267 73.14 7.21333 74.128 6.572C75.116 5.91333 76.26 5.584 77.56 5.584C78.288 5.584 78.964 5.70533 79.588 5.948C80.2293 6.17333 80.7927 6.52867 81.278 7.014C81.7633 7.482 82.1447 8.08 82.422 8.808C82.6993 9.51867 82.838 10.3593 82.838 11.33L73.686 11.486C73.686 12.8033 73.8247 13.9647 74.102 14.97C74.3967 15.958 74.8647 16.7293 75.506 17.284C76.1473 17.8213 76.9707 18.09 77.976 18.09C78.5133 18.09 79.0593 17.9947 79.614 17.804C80.186 17.6133 80.7147 17.3533 81.2 17.024C81.6853 16.6947 82.0753 16.3307 82.37 15.932L82.994 16.452C82.526 17.18 81.9627 17.7607 81.304 18.194C80.6453 18.6273 79.9693 18.9393 79.276 19.13C78.5827 19.3207 77.9413 19.416 77.352 19.416ZM73.764 10.394H80.394C80.394 9.77 80.2987 9.172 80.108 8.6C79.9347 8.01067 79.64 7.534 79.224 7.17C78.808 6.78867 78.262 6.598 77.586 6.598C76.5807 6.598 75.74 6.90133 75.064 7.508C74.4053 8.09733 73.972 9.05933 73.764 10.394ZM87.1798 19.416C86.7811 19.416 86.4258 19.26 86.1138 18.948C85.8191 18.6187 85.6718 18.22 85.6718 17.752C85.6718 17.284 85.8278 16.8853 86.1398 16.556C86.4518 16.2267 86.8071 16.062 87.2058 16.062C87.6391 16.062 87.9945 16.2267 88.2718 16.556C88.5665 16.8853 88.7138 17.284 88.7138 17.752C88.7138 18.22 88.5578 18.6187 88.2458 18.948C87.9338 19.26 87.5785 19.416 87.1798 19.416Z" fill="white"/>
                    </svg>       
                </div>
                <div class="footer_nav">
                    <ul class="footer_nav_list">
                        <li class="footer_nav_item">
                            <a href="@" class="footer_nav_link">HOME</a>
                        </li>
                        <li class="footer_nav_item">
                            <a href="@" class="footer_nav_link">CATEGORIES</a>
                        </li>
                        <li class="footer_nav_item">
                            <a href="@" class="footer_nav_link">ABOUT</a>
                        </li>
                        <li class="footer_nav_item">
                            <a href="@" class="footer_nav_link">CONTACT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>