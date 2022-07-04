package api;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import entidades.Catador;
import dao.CatadorDao;
import java.io.PrintWriter;
import java.util.List;
import org.json.JSONArray;
import org.json.JSONObject;

@WebServlet(name = "CatadoresApi", urlPatterns = {"/catadores"})
public class CatadoresApi extends HttpServlet {
     @Override
    protected void doGet(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
         List<Catador> listaCatadores = CatadorDao.getCatadores();
         
         JSONArray retorno = new JSONArray(); 
         
         for(int i = 0; i <listaCatadores.size(); i++){
             JSONObject objetoCatadores = new JSONObject();
             objetoCatadores.put("id", listaCatadores.get(i).getId());
             objetoCatadores.put("nome", listaCatadores.get(i).getNome());
             retorno.put(objetoCatadores);
         }
         PrintWriter out = res.getWriter();
         out.print(retorno.toString());
         out.flush();
    }
}
