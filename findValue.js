function findDuplicates (a, b){

    var dup = [ ];
    
    for (var i=0; i <= a.length; i++){
      for (var j=0; j<=b.length; j++){
           if (a[i] == b[j]){
             dup.add(a[i]);
           }
      }
    }
    
    return dup;
    
    }