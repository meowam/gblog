
<style>

/* generic css */

.view {
  margin: 10px;
  float: left;
  border: 10px solid #fff;
  overflow: hidden;
  position: relative;
  text-align: center;
  box-shadow: 1px 1px 2px #e6e6e6;
  cursor: default;
  background: #fff url(../images/bgimg.jpg) no-repeat center center
}

.view .mask,
.view .content {
  width: 300px;
  height: 200px;
  position: absolute;
  overflow: hidden;
  top: 0;
  left: 0
}

.view img {
  display: block;
  position: relative
}

.view h2 {
  text-transform: uppercase;
  color: #fff;
  text-align: center;
  position: relative;
  font-size: 17px;
  font-family: Raleway, serif;
  padding: 10px;
  /*background: rgba(0, 0, 0, 0.8);*/
  margin: 20px 0 0 0
}

.view p {
  font-family: Merriweather, serif;
  font-style: italic;
  font-size: 14px;
  position: relative;
  color: #fff;
  padding: 0px 20px 0px;
  text-align: center
}

.view a.info {
  display: inline-block;
  text-decoration: none;
  padding: 7px 14px;
  background: #000;
  color: #fff;
  font-family: Raleway, serif;
  text-transform: uppercase;
  box-shadow: 0 0 1px #000
}

.view a.info:hover {
  box-shadow: 0 0 5px #000
}


/*1*/

.view-first img {
  /*1*/
  transition: all 0.2s linear;
  width: 300px;
  height: 200px;
}

.view-first .mask {
  opacity: 0;
  background-color: rgba(58, 1, 132, 0.44);
  transition: all 0.4s ease-in-out;
}

.view-first h2 {
  transform: translateY(-100px);
  opacity: 0;
  font-family: Raleway, serif;
  transition: all 0.2s ease-in-out;
}

.view-first p {
  transform: translateY(100px);
  opacity: 0;
  transition: all 0.2s linear;
}




/* */

.view-first:hover img {
  transform: scale(1.1);
}

.view-first:hover .mask {
  opacity: 1;
}

.view-first:hover h2,
.view-first:hover p,
.view-first:hover a.info {
  opacity: 1;
  transform: translateY(0px);
}

.view-first:hover p {
  transition-delay: 0.1s;
}

.view-first:hover a.info {
  transition-delay: 0.2s;
}


/*3*/

.view-tenth img {
  transform: scaleY(1);
  transition: all .7s ease-in-out;
}

.view-tenth .mask {
  background-color: rgba(255, 231, 179, 0.3);
  transition: all 0.5s linear;
  opacity: 0;
}

.view-tenth h2 {
  border-bottom: 1px solid rgba(0, 0, 0, 0.3);
  background: transparent;
  margin: 20px 40px 0px 40px;
  transform: scale(0);
  color: #333;
  transition: all 0.5s linear;
  opacity: 0;
}

.view-tenth p {
  color: #333;
  opacity: 0;
  transform: scale(0);
  transition: all 0.5s linear;
  
}

.view-tenth a.info {
  opacity: 0;
  transform: scale(0);
  transition: all 0.5s linear;
}

.view-tenth:hover img {
  -webkit-transform: scale(10);
  transform: scale(10);
  opacity: 0;
}

.view-tenth:hover .mask {
  opacity: 1;
}

.view-tenth:hover h2,
.view-tenth:hover p,
.view-tenth:hover a.info {
  transform: scale(1);
  opacity: 1;
}
</style>

  <div class="view view-first">
    <img src="/assets/img/collected_miscellany.jpg" />
    <div class="mask">
      <h2>Empire State</h2>
      <p>A cool description of some sort between these tags. I am so cool and awesomely awesome.</p>
      <a href="#" class="info">Read More</a>
    </div>
  </div>

  <div class="view view-tenth">
    <img src="/assets/img/collected_miscellany.jpg" />
    <div class="mask">
      <h2>The Only Living Boy in New York</h2>
      <p>Words and such, a whole lot more of muh flippin' words.</p>
      <a href="#" class="info">Read More</a>
    </div>
  </div>

