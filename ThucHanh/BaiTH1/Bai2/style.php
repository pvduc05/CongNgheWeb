<?php
// style.php
header('Content-Type: text/css; charset=utf-8');
?>

* {
box-sizing: border-box;
}

body {
font-family: Arial, sans-serif;
background: #f4f6f9;
margin: 0;
padding: 0;
}

.container {
max-width: 900px;
margin: 30px auto;
background: #fff;
border-radius: 8px;
box-shadow: 0 4px 10px rgba(0,0,0,0.08);
padding: 20px 25px 30px;
}

header {
text-align: center;
margin-bottom: 20px;
}

header h1 {
margin: 0;
color: #2c3e50;
}

header p {
margin: 5px 0 0;
color: #7f8c8d;
}

fieldset {
border: 1px solid #e1e4e8;
border-radius: 6px;
margin-bottom: 20px;
padding: 15px 18px;
background: #fafbfc;
}

legend {
font-weight: bold;
color: #34495e;
padding: 0 5px;
}

.question-text {
margin-bottom: 8px;
}

.option {
display: block;
margin: 5px 0;
padding: 6px 8px;
border-radius: 4px;
transition: background 0.2s;
}

.option:hover {
background: #ecf0f1;
}

.option input {
margin-right: 8px;
}

.btn-submit {
display: block;
width: 200px;
margin: 20px auto 0;
padding: 10px 15px;
background: #3498db;
color: #fff;
border: none;
border-radius: 25px;
font-size: 16px;
cursor: pointer;
transition: background 0.2s, transform 0.1s;
}

.btn-submit:hover {
background: #2980b9;
}

.btn-submit:active {
transform: scale(0.97);
}

.result {
margin-top: 25px;
padding-top: 15px;
border-top: 1px solid #e1e4e8;
}

.result h2 {
margin-top: 0;
color: #27ae60;
}

.result ul {
list-style: none;
padding-left: 0;
}

.result li {
margin: 4px 0;
}

.correct {
color: #27ae60;
font-weight: bold;
}

.incorrect {
color: #e74c3c;
font-weight: bold;
}

.score {
font-size: 18px;
font-weight: bold;
color: #2c3e50;
}

footer {
text-align: center;
margin-top: 20px;
color: #95a5a6;
font-size: 13px;
}

@media (max-width: 600px) {
.container {
margin: 10px;
padding: 15px;
}
.btn-submit {
width: 100%;
}
}