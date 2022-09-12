package api;
import dao.MateriaisDao;
import entidades.Material;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.List;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.json.JSONArray;
import org.json.JSONObject;


@WebServlet(name = "MateriaisApi", urlPatterns = {"/materiais"})
public class MateriaisApi extends HttpServlet {
     @Override
    protected void doGet(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
         List<Material> listaMateriais = MateriaisDao.getMateriais();
         
         JSONArray retorno = new JSONArray(); 
         
         for(int i = 0; i <listaMateriais.size(); i++){
             JSONObject objetoMateriais = new JSONObject();
             objetoMateriais.put("id", listaMateriais.get(i).getId());
             objetoMateriais.put("nome", listaMateriais.get(i).getNome());
             objetoMateriais.put("preco_compra_kg", listaMateriais.get(i).getPrecoCompraKg());
             retorno.put(objetoMateriais);
         }
         PrintWriter out = res.getWriter();
         out.print(retorno.toString());
         out.flush();
    }
    
}
