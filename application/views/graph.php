<style>

@import "lesshat";

@import url(https://fonts.googleapis.com/css?family=Roboto:400+700);

body {
  background: #30303A;
  font-family: Roboto;
}

#chart {
  width: 650px;
  height: 300px;
  margin: 30px auto 0;
  display: block;
  
  #numbers {
    width: 50px; 
    height: 100%;
    margin: 0;
    padding: 0;
    display: inline-block;
    float: left;
    
    li {
      text-align: right;
      padding-right: 1em;
      list-style: none;
      height: 29px;
      border-bottom: 1px solid #444;
      position: relative;
      bottom: 30px;
      
      &:last-child {
        height: 30px;
      }
      
      span {
        color: #eee;
        position: absolute;
        bottom: 0;
        right: 10px;
      }
    }
  }
  
  #bars {
    display: inline-block;
    background: rgba(0,0,0,0.2);
    width: 600px;
    height: 300px;
    padding: 0;
    margin: 0;
    box-shadow: 0 0 0 1px #444;

    li {
      display: table-cell;
      width: 100px;
      height: 300px;
      margin: 0;
      text-align: center;
      position: relative;
      
      .bar {
        display: block;
        width: 70px;
        margin-left: 15px;
        background: #49E;
        position: absolute;
        bottom: 0;
        
        &:hover {
          background: #5AE;
          cursor: pointer;
          
          &:before {
            color: white;
            content: attr(data-percentage) '%';
            position:relative;
            bottom: 20px;
          }
        }
      }

      span {
        color: #eee;
        width: 100%;
        position: absolute;
        bottom: -2em;
        left: 0;
        text-align: center;
      }
    }
  }
}
</style>

<div id="chart">
  <ul id="numbers">
    <li><span>100%</span></li>
    <li><span>90%</span></li>
    <li><span>80%</span></li>
    <li><span>70%</span></li>
    <li><span>60%</span></li>
    <li><span>50%</span></li>
    <li><span>40%</span></li>
    <li><span>30%</span></li>
    <li><span>20%</span></li>
    <li><span>10%</span></li>
    <li><span>0%</span></li>
  </ul>
  
  <ul id="bars">
    <li><div data-percentage="56" class="bar"></div><span>Option 1</span></li>
    <li><div data-percentage="33" class="bar"></div><span>Option 2</span></li>
    <li><div data-percentage="54" class="bar"></div><span>Option 3</span></li>
    <li><div data-percentage="94" class="bar"></div><span>Option 4</span></li>
    <li><div data-percentage="44" class="bar"></div><span>Option 5</span></li>
    <li><div data-percentage="23" class="bar"></div><span>Option 6</span>
    </li>
  </ul>
</div>  