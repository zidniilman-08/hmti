<template>
 <li class="dropdown dropdown-notifications">
   <a class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-bell"></i><small v-if="unreads.length > 0" :data-count="unreads.length" class="notification-icon"></small>
    <small v-else></small>
  </a>

  <div class="dropdown-container">
   <div class="dropdown-toolbar">
      <div class="dropdown-toolbar-actions">
        <a href="#" @click="markNotificationAsRead"><i class="mdi mdi-check-all left"></i> Read All</a>
      </div>
      <h3 class="dropdown-toolbar-title">Notification ({{unreads.length}})</h3>
    </div>

    <ul class="dropdown-menu notifications">
        <li class="notification" v-for="unread in unreadnotifications" :unread="unread">
            <div class="media">
                <div class="media-left">
                    <div class="media-object">
                        <img :src="unread.data.foto_admin" class="img-circle" alt="Name">
                    </div>
                </div>
                <div class="media-body">
                    <strong class="notification-title"><a :href="'artikels/'+ unread.data.action">{{unread.data.message}}</a></strong>
                    <small class="timestamp"></small>
                 <div class="notification-meta">

                 </div>
                </div>
                <div class="media-right">
                    <div class="media-object">
                        <img :src="unread.data.foto_artikel" class="img-square">
                    </div>
                </div>
           </div>
         </li>
    </ul>
    <div class="dropdown-footer text-center">
        <a href="#">View All</a>
    </div>
  </div>
</li>
</template>

<script>
    export default {
        props: ['unreads','userid'],
        data() {
            return {
                unreadnotifications: this.unreads,
            }
        },
        methods: {
            markNotificationAsRead() {
                    axios.get('/markAsRead');
            }
        },
        mounted() {
            Echo.private('App.models.User.' + this.userid)
                .notification('notification', notif => {
                console.log(notif);
                let newUnreadNotifications = {
                  data:{
                    message:notif.meassage,
                    foto_admin:notif.foto_admin,
                    action:notif.action,
                    foto_artikel:notif.foto_artikel
                    }
                }

                this.unreads.push(newUnreadNotifications);
            });

            Echo.channel('publish-channel')
              .listen('PostPublished', post => {
                if (! ('Notification' in window)) {
                  alert('Web Notification is not supported');
                  return;
                }

                Notification.requestPermission( permission => {
                  let notification = new Notification('New post alert!', {
                    body: post.title,
                    icon: "https://pusher.com/static_logos/320x320.png"
                  });

                  notification.onclick = () => {
                    window.open(window.location.href);
                  };
                });
              })
            }
    }
</script>
