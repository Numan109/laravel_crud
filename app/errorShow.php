catch (PDOException $e) {
Session::flash("message",'Database related problem.');
}

catch (PDOException $e) {
dd($e->errorInfo);
}

catch(QueryException $e){
//return $e->getMessage();
//Session::flash("message",$e->getMessage());
Session::flash("message",$e->errorInfo[2]);
}