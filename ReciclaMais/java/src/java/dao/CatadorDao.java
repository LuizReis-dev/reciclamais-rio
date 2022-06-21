package dao;

import java.util.List;
import entidades.Catador;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

public class CatadorDao {

    public static List<Catador> getCatadores() {
        List<Catador> list = new ArrayList<Catador>();
        try{
        Connection con = ConnectionDao.getConnection();
        PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT id, nome, data_de_nascimento, cpf FROM catador");
        ResultSet rs = ps.executeQuery();
        while(rs.next()){
            Catador catador = new Catador();
            catador.setId(rs.getInt("id"));
            catador.setNome(rs.getString("nome"));
            catador.setData_de_nascimento(rs.getDate("data_de_nascimento"));
            catador.setCpf(rs.getString("cpf"));
            list.add(catador);
        }       
    }catch(Exception erro){
        System.out.println(erro);
    }
        return list;
    }
}
