<style>
    .container-error-user-inactive {
        background-color: white;
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
        text-align: center;
        position: relative;
        top: -40px;
        overflow: hidden;  
    
        background-image: url("/imgs/error/sad.svg") !important;
        background-repeat: repeat;
        background-position: center;
        background-size: 2px;
        animation: back-image-error 3s ease-in-out forwards;
       
    }



    .ops-error {
        font-size:200px;
        letter-spacing: 5vw;
        position: relative;
        top:40px;
        display: flex;
        animation: ops-error 2s ease-in-out forwards;
      
       

       
    }
    .ops-error-title::after {
        content:  '';
        background-color:white;
        width: 300px;
        height: 1px;
        border-radius: 20px;
        display: block;
        margin: 0 auto;
        
    }
    .ops-error-title {
        font-size:15px;
        letter-spacing: 10px;
        animation: fade-title 2s ease-in-out;
       
        
       
    }

    .ops-error-sub-title {
        letter-spacing: 1px;
        animation: fade-sub-title 2.5s ease-in-out;  
       
       
        
        
    }

     .span-error-letter-o {
        
       
        position: relative;
        animation: effect-o 0.9s ease forwards;
        color: #2F2F2F;
        box-shadow: 5px 18px 17px rgba(0,0,0,0.1);
        border-radius: 20px;
        
        
        
    }

         .span-error-letter-p {
        /* animation: name duration timing-function delay iteration-count direction fill-mode; */
        transform-style: preserve-3d;
        position: relative;
        animation: effect-p 1.3s ease-out forwards;
        color: #2F2F2F;
        box-shadow: 15px 18px 17px rgba(0,0,0,0.1);
        border-radius: 15px;
        
    }

    .span-error-letter-s {
        transform-style: preserve-3d;
        position: relative;
        animation: effect-s 1.7s ease-in-out forwards;
        color: #2F2F2F;
        box-shadow: 15px 17px 18px rgba(0,0,0,0.1);
        border-radius: 10px;
    }

    .span-error-letter-inter {
        transform-style: preserve-3d;
        color: #FF206E;
        position: relative;
        animation: effect-inter 2s ease-in-out forwards;
        box-shadow: 15px 20px 20px rgba(0,0,0,0.1);
        border-radius: 5px;
    }

    .back-inicial-page-a {
        letter-spacing: 1px;
        color: white;
        font-weight: 800;
        
        animation: back-inicial 1.9s ease-in-out forwards;
    }
    .back-inicial-page-span {
        padding: 2px 10px;
        border-radius: 20px 10px;
        animation: back-inicial-box 2.2s 1.5s ease-in-out forwards;
        margin-top: 5px;
        
    }
    .back-inicial-page-a:hover {
        color: #ccc;
        opacity: 0.8;
    }

    @keyframes back-inicial {
        from {
            opacity:0;
            letter-spacing: 60px;
        }
        to {
            opacity:1
            letter-spacing: 1px;
        }
    }

    @keyframes back-inicial-box {
        from {
            background: none;
            box-shadow: 0 15px 15px rgba(0, 0, 0, 0.0)
           
        }

        to {
            background-color: #354F52;
            box-shadow: 0 15px 15px rgba(0, 0, 0, 0.5)
           
        }
    }

    @keyframes back-image-error {
        from {
            opacity: 0.4;
            
        }
        to {
          opacity: 1;  
        }
    }

    @keyframes effect-o {
        from {

            transform: rotate(400deg);
            opacity: 0;
     
            color: #FB4D3D;
        }
        40% {
            color: #FB4D3D; 
        }
        to {

            transform: rotate(-5deg);
            opacity: 1; 
            color: white;
           
        }
    }
    @keyframes effect-p {
        from {

            transform: rotate(380deg);
            opacity: 0;

            color:blue;
           
        }
        40% {
            color:blue;
        }
        to {

            transform: rotate(10deg);
            opacity: 1;
            color:white;
           
        }
    }
    @keyframes effect-s {
        from {

            opacity: 0;
            transform: rotate(280deg);

            
            
        }
        40% {
            color:pink;
        }
        to {

            opacity: 1;
            transform: rotate(10deg);

            color:white;
        }
    }
    @keyframes effect-inter {
        from {

            transform: rotate(180deg);
            opacity: 0;

            color: white;
           
        }
        40% {
            color: coral;
        }
        to {

            transform: rotate(10deg);
            opacity: 1;

            color: #FF206E;
           
        }
    }


    @keyframes fade-title {
        from {
            opacity: 0;
            letter-spacing: 50px;
            color: #FF206E;
        }
        to {
            opacity: 1;
            letter-spacing: 10px;
            color: black;
        }
    }

    @keyframes fade-sub-title {
        from {
            opacity: 0;
            color:#EAC435
        }
        to {
            opacity: 1;
            color:black;
        }
    }

    

    @keyframes ops-error {
        from {
            opacity: 5;
            letter-spacing: 15vw;
            font-size: 0px;
        }
        40% {
            letter-spacing: 15vw;  
            font-size: 15px;
        }
        to {
            opacity: 1;
            letter-spacing: 5vw;
            font-size:200px;
        }
    }

    @media screen and (max-width:517px) {
        .container-error-user-inactive  , .ops-error , .ops-error-title , .ops-error-sub-title , .span-error-letter-o , 
        .span-error-letter-p , .span-error-letter-s ,  .span-error-letter-inter , .back-inicial-page-span , .back-inicial-page-a {
            animation: none;
        }
        .back-inicial-page-span {
            background-color: #354F52;
            box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3)
        }
        .ops-error {
            font-size: 100px
        }
        .ops-error-title  {
            font-size:12px;
            letter-spacing: 2px;
          
           
        }
        .ops-error {
            top:-10px;
            
           
        }
        .span-error-letter-o {
            color: white
        }
        .span-error-letter-p {
            color: white
        }
        .span-error-letter-s {
            color: white
        }
        .ops-error-title:after  {
            width: 100px;
            
        }
        .ops-error-sub-title {
            font-size: 10px;
            letter-spacing: 0px;
            margin-top: 5px
        }

        .container-error-user-inactive {
            background-size: 1px;
        }
    }
</style>