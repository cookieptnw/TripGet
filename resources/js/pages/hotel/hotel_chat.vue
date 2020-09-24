<template>
  <div>
    <div class="hotel-list shadow mb-3">
      <div class="row">
        <div class="col-md-3">
          <img src="/images/img1.jpg" width="100%" />
        </div>
        <div class="col-md-9">
          <b-card-text>
            <div class="card-body">
              <h5 class="card-title">Monna Padong</h5>
              <p class="card-text">
                Enjoy the beautiful scenery of wooden canna, decorated with
                simple bamboo works.
              </p>
            </div>
          </b-card-text>
        </div>
      </div>
    </div>
    <div class="vc-box shadow mt-5">
      <div class="panel panel-primary">
        <div class="panel-body">
          <ul class="chat">
            <li class="left clearfix">
              <span class="chat-img pull-left">
                <img
                  src="http://placehold.it/50/55C1E7/fff&text=U"
                  alt="User Avatar"
                  class="img-circle"
                />
              </span>
              <div class="chat-body clearfix">
                <div class="header">
                  <strong class="primary-font">Jack Sparrow</strong>
                  <small class="pull-right text-muted">
                    <span class="glyphicon glyphicon-time"></span>12 mins
                    ago</small
                  >
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Curabitur bibendum ornare dolor, quis ullamcorper ligula
                  sodales.
                </p>
              </div>
            </li>
            <li class="right clearfix">
              <span class="chat-img pull-right">
                <img
                  src="http://placehold.it/50/FA6F57/fff&text=ME"
                  alt="User Avatar"
                  class="img-circle"
                />
              </span>
              <div class="chat-body clearfix">
                <div class="header">
                  <small class="text-muted"
                    ><span class="glyphicon glyphicon-time"></span>13 mins
                    ago</small
                  >
                  <strong class="pull-right primary-font">Bhaumik Patel</strong>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Curabitur bibendum ornare dolor, quis ullamcorper ligula
                  sodales.
                </p>
              </div>
            </li>
            <li class="left clearfix">
              <span class="chat-img pull-left">
                <img
                  src="http://placehold.it/50/55C1E7/fff&text=U"
                  alt="User Avatar"
                  class="img-circle"
                />
              </span>
              <div class="chat-body clearfix">
                <div class="header">
                  <strong class="primary-font">Jack Sparrow</strong>
                  <small class="pull-right text-muted">
                    <span class="glyphicon glyphicon-time"></span>14 mins
                    ago</small
                  >
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Curabitur bibendum ornare dolor, quis ullamcorper ligula
                  sodales.
                </p>
              </div>
            </li>
            <li class="right clearfix">
              <span class="chat-img pull-right">
                <img
                  src="http://placehold.it/50/FA6F57/fff&text=ME"
                  alt="User Avatar"
                  class="img-circle"
                />
              </span>
              <div class="chat-body clearfix">
                <div class="header">
                  <small class="text-muted"
                    ><span class="glyphicon glyphicon-time"></span>15 mins
                    ago</small
                  >
                  <strong class="pull-right primary-font">Bhaumik Patel</strong>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Curabitur bibendum ornare dolor, quis ullamcorper ligula
                  sodales.
                </p>
              </div>
            </li>
            <li class="right clearfix">
              <span class="chat-img pull-right">
                <img
                  src="http://placehold.it/50/FA6F57/fff&text=ME"
                  alt="User Avatar"
                  class="img-circle"
                />
              </span>
              <div class="chat-body clearfix">
                <div class="header">
                  <small class="text-muted"
                    ><span class="glyphicon glyphicon-time"></span>15 mins
                    ago</small
                  >
                  <strong class="pull-right primary-font">Bhaumik Patel</strong>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Curabitur bibendum ornare dolor, quis ullamcorper ligula
                  sodales.
                </p>
              </div>
            </li>
          </ul>
        </div>
        <div class="panel-footer">
          <div class="input-group">
            <input
              id="btn-input"
              type="text"
              class="form-control input-sm"
              placeholder="Type your message here..."
            />
            <span class="input-group-btn">
              <button class="btn btn-primary" id="btn-chat">Send</button>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  middleware: "auth",

  metaInfo() {
    return { title: "Hotel" };
  },
};
</script>

<style>
.chat {
  list-style: none;
  margin: 0;
  padding: 0;
}

.chat li {
  margin-bottom: 10px;
  padding-bottom: 5px;
  border-bottom: 1px dotted #b3a9a9;
}

.chat li.left .chat-body {
  margin-left: 60px;
}

.chat li.right .chat-body {
  margin-right: 60px;
}

.chat li .chat-body p {
  margin: 0;
  color: #777777;
}

.panel .slidedown .glyphicon,
.chat .glyphicon {
  margin-right: 5px;
}

.panel-body {
  overflow-y: scroll;
  height: 350px;
  border: 1px solid #1d1d1d;
  margin-bottom: 20px;
}

::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
  background-color: #f5f5f5;
}

::-webkit-scrollbar {
  width: 12px;
  background-color: #f5f5f5;
}

::-webkit-scrollbar-thumb {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
  background-color: #555;
}
</style>