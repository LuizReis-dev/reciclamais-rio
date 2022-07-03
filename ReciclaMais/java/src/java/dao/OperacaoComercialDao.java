package dao;

import entidades.OperacaoComercial;
import java.sql.Connection;
import java.sql.PreparedStatement;

public class OperacaoComercialDao {
    
    public static int inserirCompra(OperacaoComercial operacaoComercial){
       int status = 0;  
   try{
        Connection con = ConnectionDao.getConnection();
        PreparedStatement ps = (PreparedStatement) con.prepareStatement("INSERT INTO operacao_comercial(id_catador,tipo,total) VALUES(?,'c',?)");
        ps.setInt(1, operacaoComercial.getCatador().getId());
        ps.setDouble(2, operacaoComercial.getTotal());
        status = ps.executeUpdate();
    }catch(Exception erro){
        System.out.println(erro);
    }      
       return status;
   }
}
