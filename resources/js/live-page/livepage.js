const { forEach, times } = require("lodash");

if (document.getElementById("live-page")) {
  var app = {
    data() {
      return {
        token: null,
        lastToken: null,
        dataLoaded: false,
        isCalled: false,
        called_tokens: [],
        tokens_for_next_to_call: [],
        count: "0",
        time_after_called: null,
        timer_interval: null,
        time_out: null,
        averageTime: null,
      };
    },
    methods: {
      getTokenForCall() {
        axios
          .get(window.JLToken.get_token_for_call_url)
          .then((res) => {
            this.tokens_for_next_to_call = res.data.tokens_for_call;
            this.called_tokens = res.data.called_tokens;
            this.token = this.tokens_for_next_to_call.find(
              (e) => e.reference_no == window?.JLToken.token_reference
            );
            if (this.token == null) {
              this.token = this.called_tokens.find(
                (e) => e.reference_no == window?.JLToken.token_reference
              );
            }
            console.log(this.token);


            if (
              this.called_tokens.length &&
              this.called_tokens[0] &&
              this.called_tokens[0].ended_at == null
            ) {
              this.lastToken = this.called_tokens[0];
              this.setDataForTimer(this.lastToken);
              this.isCalled = true;
              let timeArr = this.called_tokens
                .map((obj) => obj.served_time)
                .filter((e) => e != null);
              if (timeArr.length) {
                this.averageTime = this.getAverageTime(timeArr);
              }
              console.log(timeArr, this.averageTime);
            } else if (
              this.called_tokens &&
              this.called_tokens.length &&
              this.called_tokens[0]
            ) {
              let timeArr = this.called_tokens
                .map((obj) => obj.served_time)
                .filter((e) => e != null);
              if (timeArr.length) {
                this.averageTime = this.getAverageTime(timeArr);
              }
              console.log(timeArr, this.averageTime);
              this.lastToken = this.called_tokens[0];
              this.isCalled = false;
            } else {
              this.isCalled = false;
            }
            this.time_out = setTimeout(() => {
              this.getTokenForCall();
            }, 1000);
            this.disableLoader();
          })
          .catch((err) => {
            this.disableLoader();
            M.toast({
              html: window?.JLToken?.error_lang,
              classes: "toast-error",
            });
          });
      },
      getAverageTime(timeList) {
        const totalSeconds = timeList.reduce(
          (acc, timeStr) => acc + this.timeToSeconds(timeStr),
          0
        );
        const averageSeconds = Math.round(totalSeconds / timeList.length);
        return this.secondsToTime(averageSeconds);
      },
      secondsToTime(seconds) {
        const hours = Math.floor(seconds / 3600);
        const minutes = Math.floor((seconds % 3600) / 60);
        const remainingSeconds = seconds % 60;
        if (hours == 0) {
          return `${String(minutes).padStart(2, "0")} Minutes ${String(
            remainingSeconds
          ).padStart(2, "0")} Seconds`;
        }
        return `${String(hours).padStart(2, "0")} Hours ${String(
          minutes
        ).padStart(2, "0")} Minutes ${String(remainingSeconds).padStart(
          2,
          "0"
        )} Seconds`;
      },
      timeToSeconds(timeStr) {
        const [hours, minutes, seconds] = timeStr.split(":").map(Number);
        return hours * 3600 + minutes * 60 + seconds;
      },

      enableLoader() {
        $("body").removeClass("loaded");
      },

      disableLoader() {
        $("body").addClass("loaded");
      },
      timer() {
        this.timer_interval = setInterval(() => {
          if (parseInt(this.count) <= 0) {
            clearInterval();
            return;
          }
          this.time_after_called = this.toHHMMSS(this.count);
          this.count = (parseInt(this.count) + 1).toString();
        }, 1000);
      },

      toHHMMSS(count) {
        var sec_num = parseInt(count, 10);
        var hours = Math.floor(sec_num / 3600);
        var minutes = Math.floor((sec_num - hours * 3600) / 60);
        var seconds = sec_num - hours * 3600 - minutes * 60;
        if (hours < 10) {
          hours = "0" + hours;
        }
        if (minutes < 10) {
          minutes = "0" + minutes;
        }
        if (seconds < 10) {
          seconds = "0" + seconds;
        }
        var time = hours + ":" + minutes + ":" + seconds;
        return time;
      },

      setDataForTimer(token) {
        if (this.timer_interval) clearInterval(this.timer_interval);
        this.time_after_called = null;
        this.count = token.counter_time;
        if (
          token.counter_time == 0 &&
          token.started_at &&
          token.ended_at == null
        )
          this.count = "1";
        this.timer();
      },
    },
    mounted() {
      this.getTokenForCall();
    },
    unmounted() {
      clearInterval(this.time_out);
    },
  };
  window.jlTokenCallPageApp = Vue.createApp(app).mount("#live-page");
}
