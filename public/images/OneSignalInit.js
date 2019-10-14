OneSignal.push(() => {
  const appId = "637c7328-a465-4e65-9ad2-37b30a7bd597";
  const safari_web_id = "web.onesignal.auto.0b3c1e09-f01e-4f75-a6ff-3f857f927766";
  OneSignal.init({
      appId,
      safari_web_id,
      notifyButton: {
        enable: true,
      },
      autoResubscribe: true, 
      persistNotification: true,
    });
}); 