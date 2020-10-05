requirejs.config({
  paths:{
    calendar: './app/calendar',
    server: './app/server',
    'MindFusion.Scheduling': './lib/MindFusion.Scheduling'
  }
});

require(['MindFusion.Scheduling', 'calendar', 'server'], function(mfScheduling, calendar, server){

    server.getItems(calendar.loadFromJSON);

    calendar.itemCreated.addEventListener(
      function(sender, args){
        server.addItem(args.item);
      });

    calendar.itemDeleted.addEventListener(
      function(sender, args){
        server.deleteItem(args.oldItem);
      });
	  
	 let listViewControl = document.getElementById("listView");
     listViewControl.addEventListener("click", event => {
     
	  if (listViewControl.checked === true)
	  {
		calendar.currentView = mfScheduling.CalendarView.List;
		document.getElementById('monthView').checked = false;
		calendar.repaint();
	  }
    
  });
  
  let monthViewControl = document.getElementById("monthView");
     monthViewControl.addEventListener("click", event => {
     
	  if (monthViewControl.checked === true)
	  {
		calendar.currentView = mfScheduling.CalendarView.SingleMonth;
		document.getElementById('listView').checked = false;
		calendar.repaint();
	  }
    
  });
	  
	  


});
