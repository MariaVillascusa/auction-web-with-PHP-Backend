
const updateCountdown = function () {
  let datetimeP = document.getElementById("datetime");

  const MILLISECONDS_OF_A_SECOND = 1000;
  const MILLISECONDS_OF_A_MINUTE = MILLISECONDS_OF_A_SECOND * 60;
  const MILLISECONDS_OF_A_HOUR = MILLISECONDS_OF_A_MINUTE * 60;
  const MILLISECONDS_OF_A_DAY = MILLISECONDS_OF_A_HOUR * 24;

  const DATE = new Date(window.sessionStorage.getItem("datetime"));
  const NOW = new Date();
  const DURATION = DATE - NOW;
  const RESULT_DAYS = Math.floor(DURATION / MILLISECONDS_OF_A_DAY);
  const RESULT_HOURS = Math.floor(
    (DURATION % MILLISECONDS_OF_A_DAY) / MILLISECONDS_OF_A_HOUR
  );
  const RESULT_MINUTES = Math.floor(
    (DURATION % MILLISECONDS_OF_A_HOUR) / MILLISECONDS_OF_A_MINUTE
  );
  const RESULT_SECONDS = Math.floor(
    (DURATION % MILLISECONDS_OF_A_MINUTE) / MILLISECONDS_OF_A_SECOND
  );

  datetimeP.textContent =
    RESULT_DAYS +
    "d " +
    RESULT_HOURS +
    "h " +
    RESULT_MINUTES +
    "m " +
    RESULT_SECONDS +
    "s";

  return datetimeP;
};

export function chronoBucle() {
  updateCountdown();
  setInterval(updateCountdown, 1000);
}
