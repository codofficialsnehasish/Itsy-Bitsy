<script type="text/javascript" src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js"></script>
<script type="text/javascript">
 // Your web app's Firebase configuration
 //change configuration with your configuration
const firebaseConfig = {
    apiKey: "AIzaSyCWbhcZfefEQ6BiZfi3PXcFdX-aBjBo84w",
    authDomain: "zilesco-noti.firebaseapp.com",
    projectId: "zilesco-noti",
    storageBucket: "zilesco-noti.appspot.com",
    messagingSenderId: "605673099546",
    appId: "1:605673099546:web:cbb18f1534e61634bf1ca3",
    measurementId: "G-NMC6MC249P"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();

//this is key pair get from  Firebase Console -> Project Settings -> CLOUD MESSAGING -> key Pair*/
//change keypair with your keypair 
messaging.getToken({ vapidKey: 'BDwNxGfzrgDzu0O7EIQ52TMAifi2gO3svlXiNsu9ObdFwI87NJbiLCMzR_fk2YjTMXPBLLttx7E7A5vEFtLQNxc' }).then((currentToken) => {
  if (currentToken) {
    console.log(currentToken)
    //   $.ajax({
    //       url:'https://dev.local/pushdemo/Pushnote/send_push_notification',
    //       data:{token:currentToken},
    //       type:"post",
    //       success:function(data)
    //       {

    //       }

    //   })

  } else {
    // Show permission request UI
    console.log('No registration token available. Request permission to generate one.');
    // ...
  }
}).catch((err) => {
  console.log('An error occurred while retrieving token. ', err);
  // ...
});


messaging.onMessage((payload)=>{
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
 // console.log(payload['data']['link'])
       let title=payload['notification']['title'];
     	 let body=payload['notification']['body'];
       let icon =payload['notification']['icon'];
     	 new Notification(title,{
        	body:body,
          icon:icon
        })
})

messaging.onBackgroundMessage((payload) => {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
  });

  
</script>