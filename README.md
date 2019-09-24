# Keep: Sports product selling and management system
## Team Members
- Xiaoqian Xu [github](https://github.com/Cecilia-xu)
- Mengdi Xu 
- Da Lyu
## System Introduction
What we built is a shopping system on which customers could buy sports-related products, and managers have the accessibility to manage over 1000 transaction records made by customers as well as customers’ information.
There two types of users in our system which are ‘Customer’ and ‘Manager’. These two types of customers will have to register in our system first to access the system. Our website provides a series of basic functions for customers, including logging in, logging out, viewing and modifying customer profile, searching products, browsing products, adding products to the shopping cart, placing orders, as well as viewing history orders, etc. Moreover, managers are responsible to manage the users, products, transactions, employees, real stores and suppliers information. For senior managers who need to know the big picture of the sales performance, detailed numbers and charts can be provided for deep analysis and exploration.
## Functional Requirements Analysis
<img src="https://s2.ax1x.com/2019/09/24/uEaCcD.png" width = 40%></img>
<img src="https://s2.ax1x.com/2019/09/24/uEaAHA.png" width = 40%></img>
## Relational Database Schema
A set of relational schemas resulting from the E-R diagram can identify types of all the attributes, primary keys and foreign keys. Besides, we can figure out the relationship between different tables.
- one to one: products - transactions 
- one to many: supplier - products
- one to many: stores - salesman
- one to many: customer - transactions
<img src="https://s2.ax1x.com/2019/09/24/uEaxbj.png" width = 80%></img>
## System Design and Implementation
### Front-end Design & Connection
1. Front-end design<br>
We use HTML + CSS + JavaScript to design the front-end pages. Also, we use AmazeUI framework to improve our user interface and achieve responsive web pages.
- Meet business objectives<br>
Since our target customer is people who like sports, we choose bright blue as main color. Also, we use mobile-responsive framework to make sure the smooth user flow on their mobile devices so that they can shop online anytime and anywhere.
- Be easy to navigate and manipulate<br>
Our navigation bar is on the left side of every page. It is obvious for users to click. The
administration system is also very friendly for everyone to use.
- Provide sufficient capability to meet expected user needs<br>
Based on the function requirement analysis, we achieve our goals and provide all the
functions we mentioned in the previous part.
2. Connection<br>
Back-end PHP communicates with front-end HTML and JavaScript. PHP gets front- end data via POST or GET and outputs data to the front end through direct output to HTML page. Its process is: 1) PHP passes back-end data to HTML 2) PHP reads front-end GET data 3) JavaScript reads PHP back-end data.
### System implementation with example screenshots
#### Customer
- Customer Login and Create an Account<br>
<img src="https://s2.ax1x.com/2019/09/24/uE0DbQ.png" width = 80%></img>
<img src="https://s2.ax1x.com/2019/09/24/uE065n.png" width = 80%></img>
- Welcome <br>
<img src="https://s2.ax1x.com/2019/09/24/uE0WvT.png" width = 80%></img>
- Buy a product<br>
<img src="https://s2.ax1x.com/2019/09/24/uE0OxK.png" width = 80%></img>
<img src="https://s2.ax1x.com/2019/09/24/uEBEM8.png" width = 80%></img>
- Transaction <br>
<img src="https://s2.ax1x.com/2019/09/24/uEBZqg.png" width = 80%></img>
- Check transaction history and status<br>
<img src="https://s2.ax1x.com/2019/09/24/uEB1zV.png" width = 80%></img>
- Pay a product<br>
<img src="https://s2.ax1x.com/2019/09/24/uEBGsU.png" width = 80%></img>
- Search a product from transactions<br>
<img src="https://s2.ax1x.com/2019/09/24/uEBtZ4.png" width = 80%></img>
<img src="https://s2.ax1x.com/2019/09/24/uEBjWq.png" width = 80%></img>
- Edit profile<br>
<img src="https://s2.ax1x.com/2019/09/24/uEBfJI.png" width = 80%></img>
#### Manager
- Manager Login<br>
<img src="https://s2.ax1x.com/2019/09/24/uEDSyT.png" width = 80%></img>
- Welcome<br>
<img src="https://s2.ax1x.com/2019/09/25/uEDCmF.png" width = 80%></img>
- Customer management<br>
<img src="https://s2.ax1x.com/2019/09/25/uED5N9.png" width = 80%></img>
<img src="https://s2.ax1x.com/2019/09/25/uEDbjK.png" width = 80%></img>
<img src="https://s2.ax1x.com/2019/09/25/uEDvAH.png" width = 80%></img>
- Product management<br>
<img src="https://s2.ax1x.com/2019/09/25/uEr93t.png" width = 80%></img>
<img src="https://s2.ax1x.com/2019/09/25/uErAHg.png" width = 80%></img>
<img src="https://s2.ax1x.com/2019/09/25/uErVEQ.png" width = 80%></img>
- Transaction management<br>
<img src="https://s2.ax1x.com/2019/09/25/uErMvV.png" width = 80%></img>
- Employee management<br>
<img src="https://s2.ax1x.com/2019/09/25/uEr1DU.png" width = 80%></img>
- Store management<br>
<img src="https://s2.ax1x.com/2019/09/25/uErJUJ.png" width = 80%></img>

