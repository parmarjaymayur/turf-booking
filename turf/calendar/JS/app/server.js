define(['MindFusion.Scheduling'], function(mfScheduling){

  var server = {};


  /**
  * Gets the items form the database
  * @param {callback} showMethod the method to display the items with (parameter string -  a JSON object)
  */
  server.getItems =  function(showMethod){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        if(typeof showMethod === 'function'){
          showMethod(this.responseText);
        }
      }
    }
    var message = 'server/server.php?command=get';
    xhttp.open('GET', message, true);
    xhttp.send();
  }

  /**
  * Add the data to the database
  * @param {MindFusion.Scheduling.Item} item of MindFusion.Scheduling.Item-s
  */
  server.addItem = function(item){
    var xhttp = new XMLHttpRequest();

    var message = 'server/server.php?command=add';
    message += '&item=' + JSON.stringify(item, replacer);
   // console.log('localhost:80/Calendar/' + message);
    xhttp.open('GET', message, true);
    xhttp.send();
  }
  
  function replacer(key, value) {
  // Filtering out properties
  if (key === '_contacts') {
	  
	  let result = [];
	  
	  for( var i = 0; i < value._items.length; i++)
		  result.push(value._items[i]._id);
	  
    return result;
  }
  
  return value;
}

  /**
  * Deletes the item from the date in the database
  * @param {MindFusion.Scheduling.Item} item the item to be deleted
  */
  server.deleteItem =  function(item){
    var xhttp = new XMLHttpRequest();

    var message = 'server/server.php?command=delete';
    message += '&item=' + JSON.stringify(item);
     console.log('delete localhost:80/AppointmentCalendar/' + message);
    xhttp.open('GET', message, true);
    xhttp.send();
  }

  return server;
});
