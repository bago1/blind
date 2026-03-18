(function(){
			if (isEngineInited()){
			   return;
			}
		
			window.rap = window.rap || {cmd: []};
			window.rap.cmd.push(function(){
				window.rap.init({"id":"1c0c89c8-f94d-45f1-8a85-1c0935136fcc","yaMetricEnabled":false,"yaMetricId":"","uMetaEnabled":false,"pageStatsEnabled":true,"pixels":{"008daf4c-e631-4001-857a-4e709944e564":{"id":"008daf4c-e631-4001-857a-4e709944e564","customTriggerSettings":{},"isAutoRunEnabled":true,"autoRunDelaySeconds":0},"230b7cc2-45e7-44a1-9ec6-8b9afe4e2ab1":{"id":"230b7cc2-45e7-44a1-9ec6-8b9afe4e2ab1","customTriggerSettings":{"urlSubstrings":{"included":[],"excluded":[]}},"isAutoRunEnabled":true,"autoRunDelaySeconds":5},"28fdfaab-8266-495d-9afa-8960ef512080":{"id":"28fdfaab-8266-495d-9afa-8960ef512080","customTriggerSettings":{"urlSubstrings":{"included":[],"excluded":[]}},"isAutoRunEnabled":true,"autoRunDelaySeconds":15},"39300368-555f-4722-b696-9f2c046f6ad6":{"id":"39300368-555f-4722-b696-9f2c046f6ad6","customTriggerSettings":{"urlSubstrings":{"included":[],"excluded":[]}},"isAutoRunEnabled":true,"autoRunDelaySeconds":10},"4fe5ae8d-6a3b-439e-8d5c-5d7f8314ee20":{"id":"4fe5ae8d-6a3b-439e-8d5c-5d7f8314ee20","customTriggerSettings":{},"isAutoRunEnabled":false,"autoRunDelaySeconds":0},"805e1bc6-b9e9-4009-813c-754c61c6ebfa":{"id":"805e1bc6-b9e9-4009-813c-754c61c6ebfa","customTriggerSettings":{"urlSubstrings":{"included":[],"excluded":["roxot"]}},"isAutoRunEnabled":true,"autoRunDelaySeconds":5},"869e93b8-7fd1-4cc6-bb5a-ea3c7e54571a":{"id":"869e93b8-7fd1-4cc6-bb5a-ea3c7e54571a","customTriggerSettings":{"urlSubstrings":{"included":[],"excluded":["roxot"]}},"isAutoRunEnabled":true,"autoRunDelaySeconds":15},"88200033-c921-4432-a492-374a99fdd183":{"id":"88200033-c921-4432-a492-374a99fdd183","customTriggerSettings":{},"isAutoRunEnabled":false,"autoRunDelaySeconds":0},"9e14d8ad-895b-4d6e-9621-82cf2050bd5c":{"id":"9e14d8ad-895b-4d6e-9621-82cf2050bd5c","customTriggerSettings":{},"isAutoRunEnabled":false,"autoRunDelaySeconds":0},"ba485b7d-a656-406b-8e44-0289aae3bbd5":{"id":"ba485b7d-a656-406b-8e44-0289aae3bbd5","customTriggerSettings":{"urlSubstrings":{"included":["yandex"],"excluded":[]}},"isAutoRunEnabled":true,"autoRunDelaySeconds":15},"f0437d29-9d39-449f-90e4-500bcd1188dc":{"id":"f0437d29-9d39-449f-90e4-500bcd1188dc","customTriggerSettings":{"urlSubstrings":{"included":[],"excluded":["roxot"]}},"isAutoRunEnabled":true,"autoRunDelaySeconds":10},"fd0e1395-d973-485f-853b-17feb8a3e8b4":{"id":"fd0e1395-d973-485f-853b-17feb8a3e8b4","customTriggerSettings":{"urlSubstrings":{"included":[],"excluded":["roxot"]}},"isAutoRunEnabled":true,"autoRunDelaySeconds":15}},"verification":{"enabled":false,"id":""}}, 'https://rap.skcrtxr.com')
			});
		
			let engine = window.document.createElement('script');
			engine.src = 'https://rap.skcrtxr.com/pub/rap.js';
			engine.dataset.rapInited = 'true';
			window.document.head.append(engine);
		
			function isEngineInited(){
				return  document.querySelectorAll('[data-rap-inited]').length;
			}
		})()