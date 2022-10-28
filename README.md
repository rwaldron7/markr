# MarkR project
The landing page of the Git site describes the project's objectives, features, and includes a step-by-step developer guide for deploying the web application (10 marks). 
## Project objectives
The main objective of this project is to help teachers with the process of marking exams and giving feedback to students. Many teachers record their marks on paper, which makes it virtually impossible to perform any complicated data analysis on the results. It also makes it more difficult to calculate total marks and grades. For those that use a digital platform such as Microsoft Excel, it is possible to do many of the functions offered in the MarkR web application. However, the learning curve is high. The MarkR project will make it much easier to perform the same kinds of functions possible in Excel without the learning curve.
## Features
1. The framework: This application uses a custom-built MVC (Model-View-Controller) framework written in PHP
2. The login system: Users can register and log in with a username and password
3. The layout: This application uses Bootstrap for the layout
4. Creating a new exam: Users can create a new exam and add students to the class
5. Entering results: Marks can be added for each question for each student in the class
6. Configuring exams: Exams can be configured so that each question has marks allocated, a topic and a difficulty level. Cut-offs can also be set for assigning grades
7. Marking exams: As the marks are entered, the results (including total marks, percentage and grade) can be seen by pressing "Save and update"
8. Student summary: Next to each student on the marking page is a button "Summary" that gives a more detailed breakdown of how that student went
9. Tab to go to next student: Because most teachers will mark question-by-question and not student-by-student, the tab key moves the cursor down an input
10. Class summary: On the marking page is a button "Class summary" which gives the same information as the student summary, except for the class on average
## Developer guide
This web application is deployed at markr-demo.herokuapp.com. For local testing,
