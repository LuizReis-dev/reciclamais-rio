package dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;

public class UsuarioDao {
     public static int[] getRelatorioUsuarios() {

        int[] valores = {0, 0};
        
        try{
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT count(*) AS ADM FROM usuario where Acesso = 'admin'");
            ResultSet rs = ps.executeQuery();
            while(rs.next()){
                valores[0] = rs.getInt("ADM");
            }   
 
            ps = (PreparedStatement) con.prepareStatement("SELECT count(*) AS Empresa FROM usuario where Acesso = 'empresa'");
            rs = ps.executeQuery();
            while(rs.next()){
                valores[1] = rs.getInt("Empresa");
            }            
            
        }catch(Exception erro){
            System.out.println(erro);
        }
        return valores;
    }
}
