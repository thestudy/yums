<html>
    
    <!-- to install calander: $ bower install --save vaadin-date-picker -->
    
    <head>
        <script src="../bower_components/webcomponentsjs/webcomponents-lite.js"></script>
        
        <link rel="import" href="../bower_components/polymer/polymer.html">
        
        <link rel="import" href="employee-block.html">
        <link rel="import" href="answer-block.html">
        <link rel="import" href="question-block.html">
        <link rel="import" href="../bower_components/paper-button/paper-button.html">
        <!--<link rel="import" href="bower_components/iron-collapse/iron-collapse.html">-->
        
        <link rel="import" href="../bower_components/paper-dropdown-menu/paper-dropdown-menu.html">
        <link rel="import" href="../bower_components/paper-selected/paper-selected.html">
        <link rel="import" href="../bower_components/paper-item/paper-item.html">
        <link rel="import" href="../bower_components/paper-listbox/paper-listbox.html">
        <link rel="import" href="../bower_components/paper-header-panel/paper-header-panel.html">
        <link rel="import" href="../bower_components/paper-toolbar/paper-toolbar.html">
        <link rel="import" href="../bower_components/paper-radio-button/paper-radio-button.html">
        <link rel="import" href="../bower_components/paper-radio-group/paper-radio-group.html">


        
        
        <link rel="import" href="../bower_components/vaadin-date-picker/vaadin-date-picker.html">
        <link rel="import" href="../bower_components/vaadin-link/vaadin-link.html">
        <link rel="import" href="../bower_components/vaadin-script/vaadin-script.html">
        
        <link rel="import" href="../bower_components/linear-gradient/linear-gradient.html">
        
        <link rel="import" href="../bower_components/google-chart/google-chart.html">

        
        <style>
          #length-block{
            width: 600;
            float: left;
            margin: 50px;
          }

       

        </style>
  
    </head>
   
    <body>
       
       
            <google-chart
              id="length-block"
              type='column'
              options='{"title": "Distribution of Students per month"}'
              data='[["Month", "Number of Students"], ["Jan", 31], ["Feb", 28], ["Mar", 4],["Apr",116],["May", 6],["Jun", 27],["July", 60],["Aug", 1],["Sep", 4]]'


            </google-chart>
           
            
        
        
     
            
            
       
    </body>
</html>