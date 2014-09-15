function AddAlert(alert)
{
  var div = document.getElementById('MessageBox');
  
  div.innerHTML += alert;
}

/**
 * Gibt ein div Feld zurück, welche ein 'alert' mit der Klasse alertClass ist und nach 'timeout' Millisekunden
 * automatisch verschwindet.<br>
 * Das div Feld muss einem HTMLElement noch hinzugefügt werden.
 * 
 * @param string col_size Klasse der Zeile, welche die Länge bestimmt, siehe bootsrap v3.1.1
 * @param string alertClass Klasse des alert zum Beispiel 'success' für ein 'alert-success', siehe bootstrap v3.1.1 .
 * @param string content Enthält den Inhalt, welcher anzuzeigen ist.
 * @param string id Einzigartige ID, welche dem div Feld zugewiesen werden soll.
 * @param number timeout Anzahl der Millisekunden bis das div Feld verschwinden soll.
 * 
 * @return <b>string</b> Der String, welcher das div Feld enthält.
 */
function GetAlert(col_size, alertClass, content, id, timeout)
{
  setTimeout(
      function()
      {
        $('#' + id).fadeTo(500, 0).slideUp(500, function()
        {
          $(this).remove();
        });
      },
      timeout);
  
  return '<div class="' + col_size + '" id="' + id + '"><div class="alert alert-' + alertClass + ' fade-in flash"><button type="button" role="alert" class="close" data-dismiss="alert">&times;</button>' + content + '</div></div></div>';
}

/**
 * Gibt ein span Feld zurück, welche ein 'label' mit der Klasse labelClass ist.<br>
 * Das span Feld muss einem HTMLElement noch hinzugefügt werden.
 * 
 * @param string labelClass Klasse des alert zum Beispiel 'success' für ein 'label-success', siehe bootstrap v3.1.1 .
 * @param string content Enthält den Inhalt, welcher anzuzeigen ist.
 * 
 * @return <b>string</b> Der String, welcher das span Feld enthält.
 */
function GetLabel(labelClass, content)
{
  return '<span class="label label-' + badgeClass + '">' + content + '</span>';
}

/**
 * Gibt ein span Feld zurück, welche ein 'badge' mit der Klasse badgeClass ist.<br>
 * Das span Feld muss einem HTMLElement noch hinzugefügt werden.
 * 
 * @param string badgeClass Klasse des alert zum Beispiel 'success' für ein 'badge-success', siehe bootstrap v3.1.1 .
 * @param string content Enthält den Inhalt, welcher anzuzeigen ist.
 * 
 * @return <b>string</b> Der String, welcher das span Feld enthält.
 */
function GetBadge(badgeClass, content)
{
  return '<span class="badge badge-' + badgeClass + '">' + content + '</span>';
}