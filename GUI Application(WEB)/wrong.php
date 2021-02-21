
<html>
<style>
@import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

html, body {
  margin: 0;
  min-height: 100vh;
  padding: 0;
}

body {
  background: #8A2387;
  background: linear-gradient(to right, #F27121, #E94057, #8A2387);
  position: relative;
  text-align: center;
}

button {
  background: none;
  border: 0;
  box-sizing: border-box;
  color: transparent;
  cursor: pointer;
  font-family:Roboto;
  font-size: 30px;
  left: 70%;
  letter-spacing: 1.5px;
  line-height: 160px;
  outline: none;
  overflow: hidden;
  padding: 10px 0 0;
  position: absolute;
  text-transform: uppercase;
  top: 50%;
  transform: translate(-50%, -50%);
  transition: all 0.2s ease-in;
  width: 800px;
}

button::before,
button::after {
  background-color: white;
  content: '';
  display: block;
  height: 5px;
  left: 0;
  position: absolute;
  transform-origin: center left;
  transition: all 0.2s ease-in;
  width: 741.214px;
  z-index: -1;
}

button::before {
  top: 0;
  transform: rotate(45deg);
}

button::after {
  bottom: 0;
  transform: rotate(-45deg);
}

button:hover {
  color: #8A2387;
}

button:hover::before,
button:hover::after {
  height: 30px;
  transform: rotate(0deg);
}

</style>
<body>
<button>
  Something is wrong!
</button>
</body>
</html>
