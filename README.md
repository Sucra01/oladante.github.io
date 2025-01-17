body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f0f0f0;
    margin: 0;
    font-family: Arial, sans-serif;
}

.calculator {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    overflow: hidden;
}

#display {
    width: 100%;
    padding: 20px;
    font-size: 2em;
    border: none;
    box-sizing: border-box;
    text-align: right;
}

.buttons {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
}

button {
    padding: 20px;
    font-size: 1.5em;
    border: 1px solid #ddd;
    background-color: #f9f9f9;
    cursor: pointer;
    outline: none;
}

button:hover {
    background-color: #f1f1f1;
}

button:active {
    background-color: #ddd;
}

button:nth-child(3n+1) {
    color: #ff6f61;
}
