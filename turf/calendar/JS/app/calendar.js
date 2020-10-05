define(['MindFusion.Scheduling'], function(mfScheduling){
  var calendar = new mfScheduling.Calendar(document.getElementById('calendar'));
  calendar.monthSettings.showPaddingDays  = false;
  calendar.currentView = mfScheduling.CalendarView.SingleMonth; //.List;
  calendar.theme = "standard";

  var resource;

  // add some contacts to the schedule.contacts collection
  resource = new mfScheduling.Contact();
  resource.firstName = "Emmy";
  resource.lastName = "Noether";
  resource.id = "en1";
  calendar.schedule.contacts.add(resource);

  resource = new mfScheduling.Contact();
  resource.firstName = "Ernest";
  resource.lastName = "Henley";
  resource.id = "eh1";
  calendar.schedule.contacts.add(resource);
  
  resource = new mfScheduling.Contact();
  resource.firstName = "James";
  resource.lastName = "Brown";
  resource.id = "jb1";
  calendar.schedule.contacts.add(resource);
  
  resource = new mfScheduling.Contact();
  resource.firstName = "Caroline";
  resource.lastName = "Davidson";
  resource.id = "cd1";
  calendar.schedule.contacts.add(resource);

  // add some locations to the schedule.locations collection
  resource = new mfScheduling.Location();
  resource.name = "Oxford";
  calendar.schedule.locations.add(resource);

  resource = new mfScheduling.Location();
  resource.name = "Harvard";
  calendar.schedule.locations.add(resource);

calendar.groupType = mfScheduling.GroupType.GroupByContacts
calendar.contacts.addRange(calendar.schedule.contacts.items());

  calendar.render();
  /**
  * Loads the schedule from a JSON file
  * @param {String} jsonString the JSON string
  */
  calendar.loadFromJSON = function(jsonString){
    var data = JSON.parse(jsonString);

    for (item in data){

      var newItem = new mfScheduling.Item();
      newItem.subject = data[item].Subject;
      newItem.details = data[item].Details;
     // newItem.contacts = getContacts(data[item].Contacts);
	  getContacts(data[item].Contacts, newItem);
      newItem.location = data[item].Location;
      newItem.Task = data[item].Task;
      newItem.resources = data[item].Resources;
   	  newItem.startTime = new mfScheduling.DateTime(new Date(data[item].StartTime + "Z"));
      newItem.endTime = new mfScheduling.DateTime(new Date(data[item].EndTime + "Z"));
	//  newItem.startTime = new mfScheduling.DateTime(new Date(data[item].StartTime));
    //  newItem.endTime = new mfScheduling.DateTime(new Date(data[item].EndTime));


      calendar.schedule.items.add(newItem);
    }

    calendar.repaint();
  }
  
  function getContacts (contactString, newItem)
  {
	
	if(contactString.length > 2)
	{
		
	
	   var contacts = contactString.substring(1, contactString.length - 1);
	   var contactArray = contacts.split(',');
       for(var i = 0; i < contactArray.length; i++)
	   {
		if(contactArray[i].length < 2)
			   continue;
		//var resource = calendar.schedule.getResourceById (contactArray[i]);
		var id = contactArray[i].substring(1, contactArray[i].length - 1);
		var contact = calendar.schedule.contacts.where(function(item){return (item.id === id)}).items()[0];
		
		if(contact != null)
			newItem.contacts.add(contact);
			
	  }
	
	}
  }


  return calendar;
});
 






















